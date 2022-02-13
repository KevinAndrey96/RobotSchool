<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Worksheet;

class UsersExport implements FromCollection, WithHeadings, WithTitle, WithColumnWidths, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($id)
    {
        $this->id = $id;
    }

    public function title(): string
    {
        return 'Lista de usuarios';
    }

    public function columnWidths(): array
    {
        return [
            'A' => 10,
            'B' => 40,
            'C' => 40,
            'D' => 20,
            'E' => 10,
            'F' => 30,
            'G' => 40,
            'H' => 40,
        ];
    }

    public function styles(Worksheet|\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $sheet): array
    {
        return [
            1   => ['font' => ['bold' => true], 'alignment' => ['horizontal'=>'center']],
        ];
    }

    public function headings(): array
    {
        if ($this->id == 'coord' || $this->id == 'teach') {
            return [
                'ID',
                'NOMBRE',
                'EMAIL',
                'TELÉFONO',
                'ESTADO',
                'ROL',
                'COLEGIO',
                'CONTRASEÑA',
            ];
        }
        if ($this->id == 'stud') {
            return [
                'ID',
                'NOMBRE',
                'EMAIL',
                'TELÉFONO',
                'ESTADO',
                'ROL',
                'COLEGIO',
                'CURSO',
                'CONTRASEÑA',
            ];
        }
    }

    public function collection()
    {
        $coordinators = Array();
        if ($this->id == 'coord') {
            $users = User::where('role', 'like', 'Coordinator')->get();
            foreach ($users as $user) {
                $asocArray = [
                    'id' => $user->id,
                    'name'=> $user->name,
                    'email'=> $user->email,
                    'phone'=> $user->phone,
                    'is_enable' => $user->is_enable,
                    'role' => $user->role,
                    'school' => $user->coordinator->school->name
                    ];
                $coordinator = json_decode(json_encode($asocArray));
                $coordinators = collect($coordinators);
                $coordinators->push($coordinator);
            }

            return $coordinators;
        }
    }
}
