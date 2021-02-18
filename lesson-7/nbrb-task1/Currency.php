<?php

class Currency
{
    public $startDate = '2020-11-12';
    public $today;

    public function __construct()
    {
        $this->today = date('Y-m-d', time());
    }

    public function getRates($startDate, $endDate, $curID)
    {
        $request = 'https://www.nbrb.by/api/exrates/rates/dynamics/' . $curID . '?startdate=' . $startDate . '&enddate=' . $endDate;
        $ch = curl_init($request);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $output = json_decode(curl_exec($ch));
        curl_close($ch);
        foreach ($output as $rate) {
            $date = explode('T', $rate->Date);
            $rates[] = [
                'date' => $date[0],
                'value' => $rate->Cur_OfficialRate,
            ];
        }
        return $rates;
    }

}
