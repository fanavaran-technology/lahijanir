<?php

namespace App\Models\ACL;

use App\Models\ACL\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;


class Permission extends Model
{
    use HasFactory ;

    protected $fillable = ['key', 'title'];

    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public static function getHandlerPermissionId() {
        $handlerPermissionId = Permission::where('key', "complaint_handler")->first()->id;
        return $handlerPermissionId;
    }

    const LIST_OF_PERMISSIONS = [
        'manage_news'               =>       'مدیریت اخبار',
        'edit_news'                 =>       'مجاز به ویرایش اخبار' ,
        'create_news'               =>       'مجاز به ساخت اخبار' ,
        'delete_news'               =>       'مجاز به حذف اخبار' ,
        'manage_places'             =>       'مدیریت مکان گردشگری',
        'edit_places'               =>       'مجاز به ویرایش مکان گردشگری' ,
        'create_places'             =>       'مجاز به ساخت مکان گردشگری' ,
        'delete_places'             =>       'مجاز به حذف مکان گردشگری' ,
        'manage_public_cell'        =>       'مدیریت فراخوان عمومی',
        'edit_public_cell'          =>       'مجاز به ویرایش فراخوان عمومی' ,
        'create_public_cell'        =>       'مجاز به ساخت فراخوان عمومی' ,
        'delete_public_cell'        =>       'مجاز به حذف فراخوان عمومی' ,
        'manage_sliders'            =>       'مدیریت اسلایدر شهرداری',
        'edit_slider'               =>       'مجاز به ویرایش اسلایدر شهرداری ها' ,
        'delete_slider'             =>       'مجاز به حذف اسلایدر شهرداری ها' ,
        'create_slider'             =>       'مجاز به ساخت اسلایدر شهرداری ها' ,
        'manage_pages'              =>       'مدیریت صفحات',
        'edit_page'                 =>       'مجاز به ویرایش صفحات' ,
        'delete_page'               =>       'مجاز به حذف صفحات' ,
        'create_page'               =>       'مجاز به ساخت صفحات' ,
        'manage_menus'              =>       'مدیریت منو',
        'edit_menu'                 =>       'مجاز به ویرایش منوها' ,
        'delete_menu'               =>       'مجاز به حذف منوها' ,
        'create_menu'               =>       'مجاز به ساخت منوها' ,
        'manage_users'              =>       'مدیریت کاربران',
        'edit_user'                 =>       'مجاز به ویرایش کاربران' ,
        'delete_user'               =>       'مجاز به حذف کاربران' ,
        'create_user'               =>       'مجاز به ساخت کاربران' ,
        'set_user_permission'       =>       'دسترسی دادن به کاربران' ,
        'manage_files'              =>       'مدیریت فایل ها',
        'manage_logs'               =>       'مدیریت لاگ ها' ,
        'restore_trashed'           =>       'بازیابی از سطل زباله' ,
        'delete_trashed'            =>       'حذف از سطل زباله' ,
        'manage_roles'              =>       'مدیریت نقش ها' ,
        'delete_roles'              =>       'مجاز به حذف نقش ها' ,
        'edit_roles'                =>       'مجاز به ویرایش نقش ها' ,
        'create_roles'              =>       'مجاز به ساخت نقش ها' ,
        'set_user_permission_role'  =>       'دسترسی دادن به نقش ها' ,
        'setting_manage'            =>       'دسترسی به تنظیمات' ,
        'manage_clarification'      =>       'دسترسی به بخش شفاف سازی' ,
        'manage_communication'      =>       'دیدن و پاسخ به پیام های شهروندان' ,
        'log'                       =>       'دسترسی به لاگ ها' ,
        'manage_theater'            =>       'دسترسی به تئاتر' ,
        'manage_mayor'              =>       'دسترسی به شهرداران' ,
        'manage_council'            =>       'دسترسی به اعضا شورا' ,
        'manage_mayor_speech'       =>       'دسترسی به سخن شهردار' ,
        'manage_fire_sliders'       =>       'دسترسی به اسلایدر آتش نشانی' ,
        'manage_fire_news'          =>       'دسترسی به اخبار آتش نشانی' ,
        'manage_complaint'          =>       'دسترسی به سامانه شکایت' ,
        'complaint_handler'         =>       'متصدی شکایت',
    ];

}
