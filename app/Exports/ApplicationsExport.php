<?php

namespace App\Exports;

use App\Models\Award;
use App\Models\AwardSeason;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

use Monolog\Handler\IFTTTHandler;


class ApplicationsExport implements FromCollection, WithMapping, ShouldAutoSize, WithHeadings
{

    public $awardSeasonId;

    public function __construct($awardSeasonId)
    {
        $this->awardSeasonId = $awardSeasonId;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $awardSeasons = AwardSeason::findOrFail($this->awardSeasonId);
        return $awardSeasons->apps()
            ->addSelect(['steps' => Award::select('steps')
                    ->whereColumn('award_id', 'awards.id')->limit(1) ?? ''])
            ->addSelect(['award_type' => Award::select('award_type')
                    ->whereColumn('award_id', 'awards.id')->limit(1) ?? ''])
            ->with('user')
            ->get();
    }

    public function map($row): array
    {

        $isAccepted = $row->is_accepted;
        if ($isAccepted == 1 || true) {
           $isAccepted = __('keywords.has.approval');
        }
        elseif($isAccepted == false || null){
            $isAccepted = __('keywords.dos.not.have.approval');
        }

        $nominationStatus = $row->nomination_status;
        if ($nominationStatus == 1 || true) {
            $nominationStatus = __('keywords.is.nomination');
        }
        elseif($nominationStatus == false || null){
            $nominationStatus = __('keywords.is.not.nomination');
        }

        return [
            $row->user->name,
            $row->user->email,
            url($row->cv_file),
            $isAccepted,
            $nominationStatus,
        ];
    }


    public function headings(): array
    {
        return [
            'Name', 'Email', 'Cv link file', 'Is Accepted', 'Nomination Status'
        ];
    }


}
