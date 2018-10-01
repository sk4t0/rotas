<?php
/**
 * Created by PhpStorm.
 * User: skato
 * Date: 01/10/18
 * Time: 5.58
 */

namespace App\Library;

use App\Models\Rota;
use App\Models\Shift;
use Carbon\Carbon;
use Kumuwai\DataTransferObject\DTO;

class SingleManning
{

    private $rota;
    public $singleManningArray = array();

    public function __construct(Rota $rota) {

        $this->rota = $rota;
        $day = Carbon::parse($rota->week_commence_date);

        for ($i = 0; $i < 7; $i++) {

            $shiftStart = $day->toDateTimeString();
            $shiftEnd = $day->addDay()->toDateTimeString();
            $day = $day->subDay();
            $shifts = $rota->shifts()->wherebetween('start_time', [$shiftStart, $shiftEnd])->get();
            $first = true;

            foreach ($shifts as $shift) {

                $shiftArrayAlone = $this->compareShifts($shift, $shifts);
                $minutes = $this->minutesFromArray($shiftArrayAlone) -1;
                $this->singleManningArray[$day->englishDayOfWeek][$shift->staff->first_name] = $minutes;
                if($first){

                    $this->singleManningArray[$day->englishDayOfWeek]['tot'] = $minutes;

                    $first = false;

                } else {

                    $this->singleManningArray[$day->englishDayOfWeek]['tot'] = $minutes + $this->singleManningArray[$day->englishDayOfWeek]['tot'];

                }

            }
            $day = $day->addDay();
        }


        return $this->singleManningArray;

    }

    /**
     * Create an array of minutes contained in $startDate/$endDate range
     * @param $startDate
     * @param $endDate
     * @return array
     */
    public function minutesArray ($startDate, $endDate) {

        $startHour = (int)Carbon::parse($startDate)->format('H');
        $startMinutes = Carbon::parse($startDate)->format('i');
        $endHour = (int)Carbon::parse($endDate)->format('H');
        $endMinutes = Carbon::parse($endDate)->format('i');
        $minutesArray = array();

        for ($i = $startHour; $i <= $endHour; $i++){
            if (($i == $startHour) && ($i != $endHour)){

                for ($a = $startMinutes; $a <= 59; $a++){
                    $minutesArray[] = $i . $a;
                }

            } elseif (($i == $endHour) && ($i == $startHour)) {

                for ($a = $startMinutes; $a <= $endMinutes; $a++){
                    $minutesArray[] = $i . $a;
                }

            } elseif (($i == $endHour) && ($i != $startHour)) {

                for ($a = 00; $a <= $endMinutes; $a++){
                    $minutesArray[] = $i . $a;
                }

            } else {

                for ($a = 00; $a <= 59; $a++){
                    $minutesArray[] = $i . $a;
                }

            }

        }

        return $minutesArray;

    }

    /**
     * Create an array of minutes contained in $startDate/$endDate range strting from a shift
     * @param Shift $shift
     * @return array
     */
    public function shiftArray (Shift $shift) {

        $minutesArray = $this->minutesArray($shift->start_time, $shift->end_time);

        return $minutesArray;

    }

    /**
     * Create an array of minutes contained in $startDate/$endDate range strting from a shift excluding breaks
     * @param Shift $shift
     * @return array
     */
    public function shiftArrayNoBreaks (Shift $shift) {

        $shiftArray = $this->shiftArray($shift);
        $shiftBreaks = $shift->shift_breaks()->get();

        foreach ($shiftBreaks as $break){
            $breakArray = $this->minutesArray(Carbon::parse($break->start_time)->toDateTimeString(), Carbon::parse($break->end_time)->toDateTimeString());
            $shiftArray = array_diff($shiftArray, $breakArray);
        }

        return $shiftArray;

    }

    /**
     * Return an array of minutes from the $firstShift not presents in the other $shifts
     * @param Shift $firstShift
     * @param Shift $secondShift
     * @return array
     */
    public function compareShifts (Shift $firstShift, $shifts) {

        $firstArray = $this->shiftArrayNoBreaks($firstShift);

        foreach ($shifts as $shift){

            if ($shift->id != $firstShift->id) {
                $secondArray = $this->shiftArrayNoBreaks($shift);
                $firstArray = array_diff($firstArray, $secondArray);
            }
        }

        return $firstArray;

    }

    /**
     * Return the number of minutes contained in an array of minutes
     * @param $minutesArray
     * @return int
     */
    public function minutesFromArray ($minutesArray) {

        $tot = count($minutesArray);

        return $tot;

    }

}