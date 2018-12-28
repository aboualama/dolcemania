<?php 
namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
 
class Client extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    protected $fillable = ['company_name',
                           'reference_name',
                           'p_iva',
                           'legal_address',
                           'operative_address',
                           'phone_number',
                           'cell_number',
                           'web_adress',
                           'is_customer',
                           'is_supplier',
                           'is_user',
                           'bank_iban',
                           'bank_swift',
                           'bank_name',
                           'payment_term',
                           'payment_method',
                           'payment_typology',
                           'vat',
                           'product_prices_name',
                           'notes'];

    // public function pricelist()
    // {
    //     return $this->belongsToMany(ProductPrice::class, null, null, nul);
    // }



    public function product_price(){
       return $this->belongsTo(ProductPrice::class, 'product_prices_name' , 'id');
    }
  

    public function orders()
    {
        return $this->hasMany(Order::class, 'id_client' );
    }
    public function reccurentorders()
    {
        return $this->hasMany(Order::class, 'id_client' );
    }

}