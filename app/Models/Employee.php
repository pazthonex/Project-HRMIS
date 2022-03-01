<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\EncryptDecrypt;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employee';
    protected $fillable = [
        'FirstName',
        'MiddleName',
        'LastName',
        'DateOfBirth',
        'PlaceOfBirth',
        'Sex',
        'CivilStatus',
        'Citizenship',
        'TIN',
        'GSISID',
        'PagIbigID',
        'PhilHealth',
        'SSS',
        'Telephone',
        'Cellphone',
        'EmailAddress',
        'AgencyNumber',
        'isActive',
        'EmploymentStatus',
        'CurrentItem',
        'Department',
        'Ext',
        'Height',
        'Weight',
        'BloodType',
        
        
        'PHouseNo',
        'PHouseStreet',
        'PSubDivision',
        'PBarangay',
        'PTelephone',
        'PZip',

        'RHouseNo',
        'RHouseStreet',
        'RSubDivision',
        'RBarangay',
        'RTelephone',
        'RZip',

        'Prefix',
        'Suffix',
        'LoginComputation'
    ];

    
    protected $guarded = array();
    protected $with = ['department'];
    public function department(){
        return $this->belongsTo(Department::class, 'Department','id');  
    }

    public function getSexAttribute($data){
        $aes = new EncryptDecrypt();
        return (empty($data)?"":$aes->decrypt($data));
    }
    public function getCivilStatusAttribute($data){
        $aes = new EncryptDecrypt();
        return (empty($data)?"":$aes->decrypt($data));
    }
    public function getCitizenShipAttribute($data){
        $aes = new EncryptDecrypt();
        return (empty($data)?"":$aes->decrypt($data));
    }
    public function getDateOfBirthAttribute($data){
        $aes = new EncryptDecrypt();
        return (empty($data)?"":$aes->decrypt($data));
    }
    public function getPlaceOfBirthAttribute($data){
        $aes = new EncryptDecrypt();
        return (empty($data)?"":$aes->decrypt($data));
    }
    
   
    public function getPHouseNoAttribute($data){
        $aes = new EncryptDecrypt();
        return (empty($data)?"":$aes->decrypt($data));
    }
    public function getPHouseStreetAttribute($data){
        $aes = new EncryptDecrypt();
        return (empty($data)?"":$aes->decrypt($data));
    }
    public function getPSubDivisionAttribute($data){
        $aes = new EncryptDecrypt();
        return (empty($data)?"":$aes->decrypt($data));
    }
    public function getPBarangayAttribute($data){
        $aes = new EncryptDecrypt();
        return (empty($data)?"":$aes->decrypt($data));
    }
    public function getPTelephoneAttribute($data){
        $aes = new EncryptDecrypt();
        return (empty($data)?"":$aes->decrypt($data));
    }
    public function getPZipAttribute($data){
        $aes = new EncryptDecrypt();
        return (empty($data)?"":$aes->decrypt($data));
    }



    public function getRHouseNoAttribute($data){
        $aes = new EncryptDecrypt();
        return (empty($data)?"":$aes->decrypt($data));
    }
    public function getRHouseStreetAttribute($data){
        $aes = new EncryptDecrypt();
        return (empty($data)?"":$aes->decrypt($data));
    }
    public function getRSubDivisionAttribute($data){
        $aes = new EncryptDecrypt();
        return (empty($data)?"":$aes->decrypt($data));
    }
    public function getRBarangayAttribute($data){
        $aes = new EncryptDecrypt();
        return (empty($data)?"":$aes->decrypt($data));
    }
    public function getRTelephoneAttribute($data){
        $aes = new EncryptDecrypt();
        return (empty($data)?"":$aes->decrypt($data));
    }
    public function getRZipAttribute($data){
        $aes = new EncryptDecrypt();
        return (empty($data)?"":$aes->decrypt($data));
    }
    
}
