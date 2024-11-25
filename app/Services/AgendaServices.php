<?php

namespace App\Services;

use App\Dtos\Agenda\StoreAgendaDTO;
use App\Dtos\Agenda\UpdateAgendaDTO;
use App\Exceptions\StandardizedException;
use App\Models\Agenda;
use App\Repositories\AgendaRepositories;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AgendaServices
{
    public function __construct(AgendaRepositories $agendaRepositories)
    {
        $this->agendaRepositories = $agendaRepositories;
    }

    public function index(): Collection
    {
        return $this->agendaRepositories->index();
    }

    public function show(int $id): ?Agenda
    {
        $promo = $this->agendaRepositories->show($id);
        if (!$promo instanceof Agenda) {
            throw new StandardizedException('Agenda tidak ditemukan.');
        }

        return $promo;
    }

    public function store(StoreAgendaDTO $dto): Agenda
    {
        Log::info('Store Agenda', [
            'DTO' => $dto,
        ]);

        try {
            DB::beginTransaction();
            $data = $this->agendaRepositories->store($dto);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            throw new StandardizedException($exception->getMessage());
        }

        return $data;
    }

    public function update(int $id, UpdateAgendaDTO $dto): Agenda
    {
        Log::info('Update Agenda', [
            'DTO' => $dto,
        ]);

        return $this->agendaRepositories->update($id,$dto);
    }

    public function destroy(Agenda $agenda): void
    {
        Log::info('Destory Agenda', [
            $agenda->toArray()
        ]);

        $this->agendaRepositories->destroy($agenda->id);
    }
}
