<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mail;
use App\Mail\ContactMail;
  
class ContactUs extends Model
{
    use HasFactory;
  
    public $fillable = ['name', 'email', 'phone', 'subject', 'query'];
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public static function boot() {
  
        parent::boot();
  
        static::created(function ($item) {
                
            $adminEmail = "contact@onesky.com.bd";
            Mail::to($adminEmail)->send(new ContactMail($item));
        });
    }
}