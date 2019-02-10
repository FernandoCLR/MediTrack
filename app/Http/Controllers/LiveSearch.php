<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LiveSearch extends Controller
{
    function index()
    {
     return view('livesearch.live_search');
    }

    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('dashes')
         ->where('first_name', 'like', '%'.$query.'%')
         ->orWhere('second_name', 'like', '%'.$query.'%')
         ->orWhere('last_name', 'like', '%'.$query.'%')
         ->orWhere('email', 'like', '%'.$query.'%')
         ->orWhere('address', 'like', '%'.$query.'%')
         ->orWhere('nic', 'like', '%'.$query.'%')
         ->orWhere('b_grp', 'like', '%'.$query.'%')
         ->orderBy('id', 'desc')
         ->get();
         
      }
      else
      {
       $data = DB::table('dashes')
         ->orderBy('id', 'desc')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->first_name.'</td>
         <td>'.$row->second_name.'</td>
         <td>'.$row->last_name.'</td>
         <td>'.$row->address.'</td>
         <td>'.$row->email.'</td>
         <td>'.$row->nic.'</td>
         <td>'.$row->b_grp.'</td>
         <td>'.$row->m_tp_no.'</td>
         <td>"View More.."</td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }
}
