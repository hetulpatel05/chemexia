<?php

namespace App;
use App\MyCategories;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password','role','email_verified_at','otp','remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}

class UsersdataImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($myid);
        $person=explode(",",$row['person']);
        $mobile=explode(",",$row['mobile']);
        $mobilefinal=$mobile[0];

        return new MyCategories([

            'company_name'     => $row['company_name'],
            'person_name'    => $person[0],
            'mobile' => $mobilefinal,
            'email'    => $row['email'],
            'website'    => $row['web'],
            'city'    => $row['city'],
            'state'    => $row['state'],
            'products'    => $row['product'],
            'fax'    => $row['fax']
        ]);
    }
}
