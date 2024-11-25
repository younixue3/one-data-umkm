<?php

namespace App\Repositories;

use App\Dtos\Agenda\StoreAgendaDTO;
use App\Dtos\Agenda\UpdateAgendaDTO;
use App\Models\Agenda;
use Illuminate\Support\Collection;

class AgendaRepositories
{
    public function __construct(Agenda $agenda)
    {
        $this->agenda = $agenda;
    }

    public function index(): Collection
    {
        return $this->agenda->all();
    }

    public function show(int $id): ?Agenda
    {
        return $this->agenda->find($id);
    }

    public function store(StoreAgendaDTO $dto): Agenda
    {
        return $this->agenda->create([
//            'name' => $dto->name,
//            'price' => $dto->price,
//            'description' => $dto->description,
//            'start_date' => $dto->start_date,
//            'end_date' => $dto->end_date,
//            'image' => $dto->image
        ]);
    }

    public function update(int $id, UpdateAgendaDTO $dto): Agenda
    {
        $updateData = [
//            'name' => $dto->name,
//            'price' => $dto->price,
//            'description' => $dto->description,
//            'start_date' => $dto->start_date,
//            'end_date' => $dto->end_date,
        ];

//        if ($dto->image) {
//            $updateData['image'] = $dto->image;
//        }

        $this->agenda->find($id)->update($updateData);
        return $this->agenda->find($id);
    }

    public function destroy(int $id): bool
    {
        return $this->agenda->destroy($id);
    }
}
