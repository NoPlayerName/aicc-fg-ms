<?php

namespace App\Services\Transaction;

use App\Models\Transaction\FormNumber;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class FormNoService
{

    public function generate(bool $isRegenerate = false)
    {
        if ($isRegenerate) {
            $formNo = $this->generateFormNo();
        } else {
            $no = FormNumber::whereDate('created_at', Carbon::now())->latest('id')->first();
            if ($no) {
                $formNo = $no->form_number;
            } else {
                $formNo = $this->generateFormNo();
            }
        }

        return $formNo;
    }
    private function generateFormNo()
    {
        $now = Carbon::now();
        $year = $now->year;
        $month = $now->month;
        $shortYear = $now->format('y');
        $romanMonth = $this->getRomanMonth($month);
        $staticCode = 'PDBS';
        DB::beginTransaction();
        try {
            $lastFormNo = FormNumber::whereYear('created_at', $year)
                ->whereMonth('created_at', $month)
                ->latest('id')
                ->first();

            $newSequence = 1;

            if ($lastFormNo) {
                $number = explode('/', $lastFormNo->form_number);
                $lastFormNoSequence = (int) $number[0];

                $newSequence = $lastFormNoSequence + 1;
            }

            $paddedSequence = str_pad($newSequence, 2, '0', STR_PAD_LEFT);

            $newFormNo = "{$paddedSequence}/{$staticCode}/{$romanMonth}/{$shortYear}";
            // dd($newFormNo);
            FormNumber::create([
                'form_number' => $newFormNo
            ]);

            DB::commit();
            return $newFormNo;
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to generate form number',
                'error'   => $th->getMessage(),
            ], 500);
        }
    }

    private function getRomanMonth($month)
    {
        $map = [
            1 => 'I',
            2 => 'II',
            3 => 'III',
            4 => 'IV',
            5 => 'V',
            6 => 'VI',
            7 => 'VII',
            8 => 'VIII',
            9 => 'IX',
            10 => 'X',
            11 => 'XI',
            12 => 'XII'
        ];
        return $map[$month];
    }
}
