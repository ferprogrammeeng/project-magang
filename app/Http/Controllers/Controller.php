<?php

namespace App\Http\Controllers;

use App\Mail\MailPermohonan;
// use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
// use Illuminate\Foundation\Bus\DispatchesJobs;
// use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mailer\Exception\TransportException;

class Controller extends BaseController
{
  // use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


  /**
   * Kirim email
   *
   * @param  string $email_address
   * @param  string $view
   * @param  array  $email_prop
   * @return void
   */
  protected function sendMail(string $email_address, string $view, array $email_prop)
  {
    $email = new MailPermohonan($view, $email_prop);

    try {
      return Mail::to($email_address)->send($email);
    } catch (TransportException $e) {
      return false;
    }
  }


  public function waktu($t)
  {
    if      ($t >=  3 && $t <=  9) return 'pagi';
    else if ($t >= 10 && $t <= 15) return 'siang';
    else if ($t >= 16 && $t <= 19) return 'sore';
    else if ($t >= 20 || $t <=  2) return 'malam';
  }


  protected function month($m)
  {
    $months = [ 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember' ];

    return $months[$m - 1];
  }


  protected function date_time()
  {
    $bulan = $this->month((int) date('n'));
    $date_time = date('d %\s Y | H:m:s');
    $date_time = sprintf($date_time, $bulan);
    return $date_time;
  }
}
