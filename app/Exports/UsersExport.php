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

/**
 * @property $id
 */
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
            'A' => 40,
            'B' => 40,
            'C' => 20,
            'D' => 10,
            'E' => 30,
            'F' => 40,
            'G' => 40,
            'H' => 40,
            'I' => 40,
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
                'NOMBRE',
                'EMAIL',
                'TELÉFONO',
                'ESTADO',
                'ROL',
                'COLEGIO',
            ];
        }
        if ($this->id == 'stud') {
            return [
                'NOMBRE',
                'EMAIL',
                'TELÉFONO',
                'ESTADO',
                'ROL',
                'COLEGIO',
                'CURSO',
            ];
        }
    }

    public function collection()
    {
        $coorTeach = Array();
        $coorTeach = collect($coorTeach);
        $students = Array();
        $students = collect($students);
        if ($this->id == 'coord' || $this->id == 'teach') {
            if ($this->id == 'coord') {
                $users = User::where('role', 'like', 'Coordinator')->get();
            } else {
                $users = User::where('role', 'like', 'Teacher')->get();
            }
            if ($this->id == 'coord') {
            foreach ($users as $user) {
                $asocArray = [
                    'name'=> $user->name,
                    'email'=> $user->email,
                    'phone'=> $user->phone,
                    'is_enable' => $user->is_enable,
                    'role' => $user->role,
                    'school' => $user->coordinator->school->name
                    ];
                $coordinator = json_decode(json_encode($asocArray));
                $coorTeach->push($coordinator);
            }

            return $coorTeach;
            }
            if ($this->id == "teach") {
                foreach ($users as $user) {
                    $asocArray = [
                        'name'=> $user->name,
                        'email'=> $user->email,
                        'phone'=> $user->phone,
                        'is_enable' => $user->is_enable,
                        'role' => $user->role,
                        'school' => $user->teacher->school->name
                    ];
                    $teacher = json_decode(json_encode($asocArray));
                    $coorTeach->push($teacher);
                }

                return $coorTeach;
            }

        }
        if ($this->id == "stud") {
            $users = User::where('role', 'like', 'Student')->get();
            foreach ($users as $user) {
                if (isset($user->student->classroom)){
                    $className = $user->student->classroom->name;
                } else {
                    $className = '';
                }
                $asocArray = [
                    'name'=> $user->name,
                    'email'=> $user->email,
                    'phone'=> $user->phone,
                    'is_enable' => $user->is_enable,
                    'role' => $user->role,
                    'school' => $user->student->school->name,
                    'classroom' => $className
                ];
                $student = json_decode(json_encode($asocArray));
                $students->push($student);
            }

            return $students;
        }
    }
}
