<?php

namespace App\Http\Controllers;

use App\Services\NewsServices;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(NewsServices $newsServices)
    {
        $news = $newsServices->index(3);

        return inertia("Welcome", [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'news' => $news
        ]);
    }

    public function profil()
    {
        return inertia("Profil/Index");
    }

    public function visiMisi()
    {
        return inertia("Profil/VisiMisi");
    }

    public function tugasPokokFungsi()
    {
        return inertia("Profil/TugasPokokFungsi");
    }

    public function satuData()
    {
        // $ukmData = \App\Models\Ikm::with([
        //     'typeindustries',
        //     'typeproducts',
        //     'kelurahan',
        //     'kecamatan', 
        //     'kabupaten',
        //     'provinsi'
        //     ])->get();
        
        // $bigIndustries = \App\Models\Bigindustri::with([
        //     'kabupaten',
        //     ])->get();

        // // Group UKM data by kabupaten and year
        // $ukmByKabupatenYear = $ukmData->groupBy('kabupaten.name')
        //     ->map(function ($kabupatens) {
        //         return $kabupatens->groupBy('tahun_data')
        //             ->map(function ($years) {
        //                 return $years->count();
        //             });
        //     });
        
        // // Group Big Industries data by kabupaten and year
        // $bigIndustriesByKabupatenYear = $bigIndustries->groupBy('kabupaten.name')
        //     ->map(function ($kabupatens) {
        //         return $kabupatens->groupBy('tahun_data')
        //             ->map(function ($years) {
        //                 return $years->count();
        //             });
        //     });

        // // Get most common product type per year
        // $mostCommonProductPerYear = $ukmData->groupBy('tahun_data')
        //     ->map(function ($yearGroup) {
        //         $productCounts = $yearGroup->flatMap(function ($item) {
        //                 return $item->typeproducts->pluck('name');
        //             })
        //             ->countBy();
                
        //         $topProduct = $productCounts->sortDesc()
        //             ->take(1)
        //             ->map(function ($count, $name) {
        //                 return [
        //                     'name' => $name,
        //                     'count' => $count
        //                 ];
        //             })
        //             ->values()
        //             ->toArray();

        //         return [
        //             'year' => $yearGroup->first()->tahun_data,
        //             'products' => $topProduct
        //         ];
        //     })
        //     ->values()
        //     ->toArray();

        // // Get most common industry type per year  
        // $mostCommonIndustryPerYear = $ukmData->groupBy('tahun_data')
        //     ->map(function ($yearGroup) {
        //         $industryCounts = $yearGroup->flatMap(function ($item) {
        //                 return $item->typeindustries->pluck('name');
        //             })
        //             ->countBy();
                
        //         $topIndustry = $industryCounts->sortDesc()
        //             ->take(1)
        //             ->map(function ($count, $name) {
        //                 return [
        //                     'name' => $name,
        //                     'count' => $count
        //                 ];
        //             })
        //             ->values()
        //             ->toArray();

        //         return [
        //             'year' => $yearGroup->first()->tahun_data,
        //             'industries' => $topIndustry
        //         ];
        //     })
        //     ->values()
        //     ->toArray();

        // $kabupatenList = \App\Models\Kabupaten::select('id', 'name')->get();
        // $productTypes = \App\Models\Typeproduct::select('id', 'name')->get();
        // $industryTypes = \App\Models\Typeindustrie::select('id', 'name')->get();

        return inertia("SatuData/Industri", [
            // 'laravelVersion' => Application::VERSION,
            // 'phpVersion' => PHP_VERSION,
            // 'dataUkm' => $ukmData,
            // 'dataBigIndustries' => $bigIndustries,
            // 'ukmByKabupatenYear' => $ukmByKabupatenYear,
            // 'bigIndustriesByKabupatenYear' => $bigIndustriesByKabupatenYear,
            // 'mostCommonProductPerYear' => $mostCommonProductPerYear,
            // 'mostCommonIndustryPerYear' => $mostCommonIndustryPerYear,
            // 'kabupatenList' => $kabupatenList,
            // 'productTypes' => $productTypes,
            // 'industryTypes' => $industryTypes
        ]);
    }

    public function satuDataPerdagangan()
    {

        return inertia("SatuData/Perdagangan", []);
    }

    public function satuDataKoperasiUkm()
    {

        return inertia("SatuData/KoperasiUkm", []);
    }

    public function satuDataPelatihan() 
    {
        return inertia("SatuData/Pelatihan", []);
    }

    public function satuDataPemetaanPelatihan()
    {
        return inertia("SatuData/PemetaanPelatihan", []);
    }

    public function hargaBahanPokok()
    {
        return inertia("Informasi/HargaBahanPokok/Index");
    }
}
