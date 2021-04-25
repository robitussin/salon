<?php

namespace App\Models;

use CodeIgniter\Model;

class StatisticsModel extends Model
{

    public function getTotalMonthlyEarnings()
    {
        /*
        $this->db->select('*');
        $this->db->from('blogs');
        $this->db->join('comments', 'comments.id = blogs.id');
        $query = $this->db->get();
        
        // Produces:
        // SELECT * FROM blogs JOIN comments ON comments.id = blogs.id
        */
/*
        $this->db->select('SUM(servicecost)');
        $this->db->from('services');
        $this->db->join('appointment', 'appointment.servicename = services.servicename');
        //$this->db->where('appointment.datetime', $name);
        $this->db->where('appointment.datetime >=', minvalue);
        $this->db->where('appointment.datetime <=', maxvalue);
        $this->db->where('appointment.status <=', 'COMPLETE');
        $query = $this->db->getRow();
*/
        // Produces:
        // SELECT * FROM blogs JOIN comments ON comments.id = blogs.id
    }

    public function getTotalYearlyEarnings()
    {
        //
    }
}