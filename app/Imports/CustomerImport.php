<?php

namespace App\Imports;


use App\Model\Customer;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;

class CustomerImport implements ToModel
{

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if($row[0] != "Zone"){
            $zoneId = $this->getZoneId($row[0]);
            $package = $this->getPackageId($row[1]);
            $status = $this->getConnectionStatus($row[6]);
            $connectionDate = $this->getConnectionDate($row[10]);
            return new Customer([
                'zoneName'          => $row[0],
                'package'           => $row[1],
                'name'              => $row[2],
                'address'           => $row[3],
                'mobile'            => $row[4],
                'username'          => $row[5],
                'connectionStatus'  => $status,
                'assignBandWidth'   => $row[7],
                'bandWidth'         => $row[8],
                'connectionMode'    => $row[9],
                'connectionDate'    => $connectionDate,
                'monthlyBill'       => $package->price,
                'zone_id'           => $zoneId,
                'package_id'        => $package->id
            ]);
        }

    }

    private function getZoneId($zone)
    {
        $location = DB::table('locations')
            ->select('id')
            ->where('name', '=', $zone)
            ->first();
        if($location){
            return $location->id;
        }else{
            $id = DB::table('locations')->insert( [ 'location_type' => 'zone' ,'name' => $zone,'status'=>1]);
            return $id;
        }
    }

    private function getPackageId($package)
    {
        $internet = DB::table('internet_packages')
            ->select('id','price')
            ->where('name', '=', $package)
            ->first();
        if($internet){
            return $internet;
        }
        return false;
    }



    private function getConnectionDate($connectionDate){
        if($connectionDate){
            $con = strtotime($connectionDate);
            $date = date('Y-m-d',$con);
            return $date;

        }else{
            $date = date('Y-m-d');
            return $date;
        }
    }

    private function getConnectionStatus($status)
    {
        if($status == "1"){
            return "Active";
        }elseif($status == 0 ){
            return "In-active";
        }else{
            return "Hold";
        }
    }

}
