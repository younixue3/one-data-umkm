<?php

namespace App\Http\Controllers;

use App\Services\NewsServices;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Models\Kabupaten;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(NewsServices $newsServices)
    {
        $news = $newsServices->index(3);

        return view("Front.index", [
            'news' => $news
        ]);
    }

    public function profil()
    {
        return view("Front.profil");
    }

    public function visiMisi()
    {
        return view("Front.visiMisi");
    }

    public function tugasPokokFungsi()
    {
        return view("Front.tugasPokokFungsi");
    }

    public function satuData()
    {
        $ukmData = \App\Models\Ikm::with([
            'typeindustries',
            'typeproducts',
            'kelurahan',
            'kecamatan', 
            'kabupaten',
            'provinsi'
            ])->get();
        
        $bigIndustries = \App\Models\Bigindustri::with([
            'kabupaten',
            ])->get();

        // Gabungkan data IKM dan Big Industries berdasarkan kabupaten
        $combinedIndustriesByKabupaten = [];
        
        // Proses data IKM
        foreach ($ukmData as $ikm) {
            $kabupatenName = $ikm->kabupaten->name ?? 'Tidak Diketahui';
            $tahun = $ikm->tahun_data ?? 'Tidak Diketahui';
            
            if (!isset($combinedIndustriesByKabupaten[$kabupatenName])) {
                $combinedIndustriesByKabupaten[$kabupatenName] = [
                    'name' => $kabupatenName,
                    'ikm_count' => 0,
                    'big_industries_count' => 0,
                    'years' => []
                ];
            }
            
            $combinedIndustriesByKabupaten[$kabupatenName]['ikm_count']++;
            
            if (!isset($combinedIndustriesByKabupaten[$kabupatenName]['years'][$tahun])) {
                $combinedIndustriesByKabupaten[$kabupatenName]['years'][$tahun] = [
                    'ikm' => 0,
                    'big_industries' => 0
                ];
            }
            
            $combinedIndustriesByKabupaten[$kabupatenName]['years'][$tahun]['ikm']++;
        }
        
        // Proses data Big Industries
        foreach ($bigIndustries as $industry) {
            $kabupatenName = $industry->kabupaten->name ?? 'Tidak Diketahui';
            $tahun = $industry->tahun_data ?? 'Tidak Diketahui';
            
            if (!isset($combinedIndustriesByKabupaten[$kabupatenName])) {
                $combinedIndustriesByKabupaten[$kabupatenName] = [
                    'name' => $kabupatenName,
                    'ikm_count' => 0,
                    'big_industries_count' => 0,
                    'years' => []
                ];
            }
            
            $combinedIndustriesByKabupaten[$kabupatenName]['big_industries_count']++;
            
            if (!isset($combinedIndustriesByKabupaten[$kabupatenName]['years'][$tahun])) {
                $combinedIndustriesByKabupaten[$kabupatenName]['years'][$tahun] = [
                    'ikm' => 0,
                    'big_industries' => 0
                ];
            }
            
            $combinedIndustriesByKabupaten[$kabupatenName]['years'][$tahun]['big_industries']++;
        }
        
        // Tambahkan koordinat untuk setiap kabupaten
        $kabupatenCoordinates = [
            'KABUPATEN BULUNGAN' => ['id' => '366', 'coords' => [117.0794, 2.904]],
            'KABUPATEN MALINAU' => ['id' => '367', 'coords' => [116.6388, 3.5845]],
            'KABUPATEN NUNUKAN' => ['id' => '368', 'coords' => [117.6467, 4.1357]],
            'KABUPATEN TANA TIDUNG' => ['id' => '369', 'coords' => [117.2502, 3.5519]],
            'KOTA TARAKAN' => ['id' => '370', 'coords' => [117.6333, 3.3]]
        ];
        
        // Gabungkan data koordinat dengan data industri
        foreach ($combinedIndustriesByKabupaten as $kabupatenName => &$data) {
            if (isset($kabupatenCoordinates[$kabupatenName])) {
                $data['id'] = $kabupatenCoordinates[$kabupatenName]['id'];
                $data['coords'] = $kabupatenCoordinates[$kabupatenName]['coords'];
            } else {
                $data['id'] = null;
                $data['coords'] = null;
            }
        }
        
        // Konversi ke array untuk digunakan di view
        $combinedIndustriesByKabupaten = array_values($combinedIndustriesByKabupaten);


        // Group UKM data by kabupaten and year
        $ukmByKabupatenYear = $ukmData->groupBy('kabupaten.name')
            ->map(function ($kabupatens, $kabupatenName) {
                $result = ['name' => $kabupatenName];
                
                // Group by year and count
                $yearCounts = $kabupatens->groupBy('tahun_data')
                    ->map(function ($years) {
                        return $years->count();
                    });
                
                // Add year counts to result
                foreach ($yearCounts as $year => $count) {
                    $result[$year] = $count;
                }
                
                return $result;
            })
            ->values()
            ->toArray();
        
        // Group Big Industries data by kabupaten and year
        $bigIndustriesByKabupatenYear = $bigIndustries->groupBy('kabupaten.name')
            ->map(function ($kabupatens, $kabupatenName) {
                $result = ['name' => $kabupatenName];
                
                // Group by year and count
                $yearCounts = $kabupatens->groupBy('tahun_data')
                    ->map(function ($years) {
                        return $years->count();
                    });
                
                // Add year counts to result
                foreach ($yearCounts as $year => $count) {
                    $result[$year] = $count;
                }
                
                return $result;
            })
            ->values()
            ->toArray();
            
        // Get most common product type per year
        $mostCommonProductPerYear = $ukmData
            ->flatMap(function ($item) {
                return $item->typeproducts->map(function ($product) use ($item) {
                    return [
                        'name' => $product->name,
                        'year' => $item->tahun_data
                    ];
                });
            })
            ->groupBy('name')
            ->map(function ($products, $productName) {
                $result = ['name' => $productName];
                
                // Hitung jumlah per tahun
                $yearCounts = $products->groupBy('year')
                    ->map(function ($yearGroup) {
                        return $yearGroup->count();
                    });
                
                // Tambahkan jumlah per tahun ke hasil
                foreach ($yearCounts as $year => $count) {
                    $result[$year] = $count;
                }
                
                return $result;
            })
            ->values()
            ->toArray();

        // Get most common industry type per year  
        $mostCommonIndustryPerYear = $ukmData->groupBy('tahun_data')
            ->map(function ($yearGroup) {
                $industryCounts = $yearGroup->flatMap(function ($item) {
                        return $item->typeindustries->pluck('name');
                    })
                    ->countBy();
                
                $topIndustry = $industryCounts->sortDesc()
                    ->take(1)
                    ->map(function ($count, $name) {
                        return [
                            'name' => $name,
                            'count' => $count
                        ];
                    })
                    ->values()
                    ->toArray();

                return [
                    'year' => $yearGroup->first()->tahun_data,
                    'industries' => $topIndustry
                ];
            })
            ->values()
            ->toArray();

        $kabupatenList = Kabupaten::select('id', 'name')->get();
        $productTypes = \App\Models\Typeproduct::select('id', 'name')->get();
        $industryTypes = \App\Models\Typeindustrie::select('id', 'name')->get();

        return view("Front.satuData.industri", [
            // 'laravelVersion' => Application::VERSION,
            // 'phpVersion' => PHP_VERSION,
            'dataUkm' => $ukmData,
            'dataBigIndustries' => $bigIndustries,
            'ukmByKabupatenYear' => $ukmByKabupatenYear,
            'bigIndustriesByKabupatenYear' => $bigIndustriesByKabupatenYear,
            'mostCommonProductPerYear' => $mostCommonProductPerYear,
            'mostCommonIndustryPerYear' => $mostCommonIndustryPerYear,
            'kabupatenList' => $kabupatenList,
            'productTypes' => $productTypes,
            'industryTypes' => $industryTypes,
            'combinedIndustriesByKabupaten' => $combinedIndustriesByKabupaten,
            // 'verticalBarData' => $verticalBarData,
            // 'horizontalBarData' => $horizontalBarData,
            // 'industryData' => $industryData,
        ]);
    }

    public function satuDataPerdagangan()
    {
        $kabupatenList = Kabupaten::select('id', 'name')->get();
        return view("Front.satuData.perdagangan", [
            'kabupatenList' => $kabupatenList
        ]);
    }

    public function satuDataKoperasiUkm()
    {
        $kabupatenList = Kabupaten::select('id', 'name')->get();
        return view("Front.satuData.koperasiUkm", [
            'kabupatenList' => $kabupatenList
        ]);
    }

    public function satuDataPelatihan() 
    {
        $kabupatenList = Kabupaten::select('id', 'name')->get();
        return view("Front.satuData.pelatihan", [
            'kabupatenList' => $kabupatenList
        ]);
    }

    public function satuDataPemetaanPelatihan()
    {
        $kabupatenList = Kabupaten::select('id', 'name')->get();
        return view("Front.satuData.koperasiUkm", [
            'kabupatenList' => $kabupatenList
        ]);
        return view("Front.satuData.pemetaanPelatihan", [
            'kabupatenList' => $kabupatenList
        ]);
    }

    public function hargaBahanPokok()
    {
        return view("Front.hargaBahanPokok");
    }

    public function kontak()
    {
        return view("Front.kontak");
    }
}
