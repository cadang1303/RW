<?php
class Reservation extends BaseConnect
{
    public function get_All_Data()
    {
        $sql = " SELECT * FROM reservations ORDER BY status";
        $this->execute($sql);
        if ($this->num_rows() === 0)
            $data = 0;
        else
            while ($datas = $this->getData())
                $data[] = $datas;
        return $data;
    }

    public function createReservation($date,$time,$address,$phone,$cus_name,$no_of_guests)
    {
        $sql = "INSERT INTO reservations(date,time,address,phone,cus_name,no_of_guests,status)
                    VALUES('$date','$time','$address','$phone','$cus_name','$no_of_guests','ordered')";
        return $this->execute($sql);            
    }

    public function updateReservattion($id,$date,$time,$address,$phone,$cus_name,$no_of_guests)
    {
        $sql = " UPDATE reservations
                    SET date='$date', time='$time', address='$address', phone ='$phone', cus_name='$cus_name'
                    , no_of_guests='$no_of_guests'
                    WHERE id='$id' ";
        return $this->execute($sql);            
    }

    public function deleteReservation($id)
    {
        $sql = "DELETE FROM reservations WHERE id = '$id'  ";
        return $this->execute($id);
    }

    public function changeStatus($id,$status)
    {
        $sql = "UPDATE reservations 
                SET status = '$status'
                WHERE id = '$id'";
        return $this->execute($sql);        
    }

    public function get_Reservation_By_Id($id)
    {
        $sql = "SELECT * FROM reservations
                WHERE id = '$id'";
        return $this->execute($sql);        
    }
}