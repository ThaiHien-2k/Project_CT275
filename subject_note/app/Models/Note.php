<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Note extends Model
{
    protected $table = 'notes';
    protected $fillable = ['note', 'ma_Mon','user_id'];
    public function user() {
        return $this->belongsTo(User::class);
    }
    public static function validate(array $data) {
        $errors = [];
        if (! $data['note']) {
            $errors['note'] = 'note is required.';
            
        }
        
// if (static::where('ma_Mon', $data['ma_Mon'])->count() > 0 ) {
//     $errors['ma_Mon'] = 'Mã môn đã tồn tại.';
//     }

        return $errors;
    }
}
