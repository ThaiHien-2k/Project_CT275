<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Subject extends Model
{
    protected $table = 'subjects';
    protected $fillable = ['subject_name', 'ma_subject','teacher','so_chi', 'user_id'];
    public function user() {
        return $this->belongsTo(User::class);
    }
    public static function validate(array $data) {
        $errors = [];
            if (! $data['subject_name']) {
                $errors['subject_name'] = 'subject_name is required.';
            }
 
    
            if (strlen($data['so_chi']) > 10 ) {
                $errors['so_chi'] = 'Invalid so_chi.';
            }

            if (strlen($data['teacher']) > 255) {
                $errors['teacher'] = 'teacher must be at most 255 characters.';
            }
                return $errors;
            }
    public function notes() {
        return $this->hasMany(note::class);
    }
}
