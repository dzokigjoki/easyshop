<div class="tab-pane" id="modules-settings-tab">
    <div class="col-md-6">
        <h5 class="col-md-12 control-label"> <strong>Каталог:</strong> </h5>
        <div class="form-group col-md-12">
            <label class="col-md-4 control-label">Во главно мени:</label>
            <div class="col-md-8">
                <input name="array_modules_catalogMenu" type="hidden" data-on-text="Да"
                    data-off-text="Не" value="0">
                <input name="array_modules_catalogMenu" @if(isset($modules['catalogMenu']) && $modules['catalogMenu']) ) checked @endif  type="checkbox" class="make-switch" data-on-text="Да"
                    data-off-text="Не" value="1">
            </div>

        </div>
        <div class="form-group col-md-12">
            <label class="col-md-4 control-label">Банери:</label>
            <div class="col-md-8">
                <input name="array_modules_banners" type="hidden" data-on-text="Да"
                    data-off-text="Не" value="0">
                <input name="array_modules_banners" @if(isset($modules['banners']) && $modules['banners']) checked @endif type="checkbox" class="make-switch" data-on-text="Да" data-off-text="Не"
                    value="1">
            </div>

        </div>
        <div class="form-group col-md-12">
            <label class="col-md-4 control-label">Лагер листа:</label>
            <div class="col-md-8">
                <input name="array_modules_lager" type="hidden" data-on-text="Да"
                    data-off-text="Не" value="0">
                <input name="array_modules_lager" @if(isset($modules['lager']) && $modules['lager']) ) checked @endif type="checkbox" class="make-switch" data-on-text="Да" data-off-text="Не"
                    value="1">
            </div>

        </div>
        <div class="form-group col-md-12">
            <label class="col-md-4 control-label">Javuvanja:</label>
            <div class="col-md-8">
                <input name="array_modules_javuvanja" type="hidden" data-on-text="Да"
                    data-off-text="Не" value="0">
                <input name="array_modules_javuvanja" @if(isset($modules['javuvanja']) && $modules['javuvanja']) ) checked @endif type="checkbox" class="make-switch" data-on-text="Да" data-off-text="Не"
                    value="1">
            </div>

        </div>
        <div class="form-group col-md-12">
            <label class="col-md-4 control-label">Курир служби:</label>
            <div class="col-md-8">
                <input name="array_modules_couriers" type="hidden" data-on-text="Да"
                    data-off-text="Не" value="0">
                <input name="array_modules_couriers" @if(isset($modules['couriers']) && $modules['couriers']) ) checked @endif type="checkbox" class="make-switch" data-on-text="Да" data-off-text="Не"
                    value="1">
            </div>

        </div>
        <div class="form-group col-md-12">
            <label class="col-md-4 control-label">Атрибути:</label>
            <div class="col-md-8">
                <input name="array_modules_attributes" type="hidden" data-on-text="Да"
                    data-off-text="Не" value="0">
                <input name="array_modules_attributes" @if(isset($modules['attributes']) && $modules['attributes']) ) checked @endif type="checkbox" class="make-switch" data-on-text="Да" data-off-text="Не"
                    value="1">
            </div>

        </div>
        <h5 class="col-md-12 control-label"> <strong>Магацин:</strong> </h5>
        <div class="form-group col-md-12">
            <label class="col-md-4 control-label">Во главно мени:</label>
            <div class="col-md-8">
                <input name="array_modules_magacinMenu" type="hidden" data-on-text="Да"
                    data-off-text="Не" value="0">
                <input name="array_modules_magacinMenu" @if(isset($modules['magacinMenu']) && $modules['magacinMenu']) ) checked @endif type="checkbox" class="make-switch" data-on-text="Да"
                    data-off-text="Не" value="1">
            </div>

        </div>
        <div class="form-group col-md-12">
            <label class="col-md-4 control-label">Резервации:</label>
            <div class="col-md-8">
                <input name="array_modules_reservations" type="hidden" data-on-text="Да"
                    data-off-text="Не" value="0">
                <input name="array_modules_reservations" @if(isset($modules['reservations']) && $modules['reservations']) ) checked @endif type="checkbox" class="make-switch" data-on-text="Да"
                    data-off-text="Не" value="1">
            </div>

        </div>
        <h5 class="col-md-12 control-label"> <strong>Категории:</strong> </h5>
        <div class="form-group col-md-12">
            <label class="col-md-4 control-label">Во главно мени:</label>
            <div class="col-md-8">
                <input name="array_modules_categoriesMenu" type="hidden" data-on-text="Да"
                    data-off-text="Не" value="0">
                <input name="array_modules_categoriesMenu" @if(isset($modules['categoriesMenu']) && $modules['categoriesMenu']) ) checked @endif type="checkbox" class="make-switch" data-on-text="Да"
                    data-off-text="Не" value="1">
            </div>
        </div>
        <h5 class="col-md-12 control-label"> <strong>Продажба:</strong> </h5>
        <div class="form-group col-md-12">
            <label class="col-md-4 control-label">Во главно мени:</label>
            <div class="col-md-8">
                <input name="array_modules_sales" type="hidden" data-on-text="Да"
                    data-off-text="Не" value="0">
                <input name="array_modules_sales" @if(isset($modules['sales']) && $modules['sales']) ) checked @endif type="checkbox" class="make-switch" data-on-text="Да" data-off-text="Не"
                    value="1">
            </div>

        </div>

        <h5 class="col-md-12 control-label"> <strong>Клиенти:</strong> </h5>
        <div class="form-group col-md-12">
            <label class="col-md-4 control-label">Во главно мени:</label>
            <div class="col-md-8">
                <input name="array_modules_clientsMenu" type="hidden" data-on-text="Да"
                    data-off-text="Не" value="0">
                <input name="array_modules_clientsMenu" @if(isset($modules['clientsMenu']) && $modules['clientsMenu']) ) checked @endif type="checkbox" class="make-switch" data-on-text="Да"
                    data-off-text="Не" value="1">
            </div>

        </div>
        
        <h5 class="col-md-12 control-label"> <strong>Останато:</strong> </h5>
        <div class="form-group col-md-12">
            <label class="col-md-4 control-label">Bundle:</label>
            <div class="col-md-8">
                <input name="array_modules_bundle" type="hidden" data-on-text="Да" data-off-text="Не" value="0">
                <input name="array_modules_bundle" @if (isset($modules['bundle']) && $modules['bundle']) ) checked @endif type="checkbox" class="make-switch" data-on-text="Да" data-off-text="Не" value="1">
            </div>

        </div>
    </div>
    <div class="col-md-6">
        <h5 class="col-md-12 control-label"> <strong>Промоции:</strong> </h5>
        <div class="form-group col-md-12">
            <label class="col-md-4 control-label">Во главно мени:</label>
            <div class="col-md-8">
                <input name="array_modules_promotionsMenu" type="hidden" data-on-text="Да"
                    data-off-text="Не" value="0">
                <input name="array_modules_promotionsMenu" @if(isset($modules['promotionsMenu']) && $modules['promotionsMenu']) ) checked @endif type="checkbox" class="make-switch" data-on-text="Да"
                    data-off-text="Не" value="1">
            </div>

        </div>  
        <div class="form-group col-md-12">
            <label class="col-md-4 control-label">Купони за попуст:</label>
            <div class="col-md-8">
                <input name="array_modules_coupons" type="hidden" data-on-text="Да"
                    data-off-text="Не" value="0">
                <input name="array_modules_coupons" @if(isset($modules['coupons']) && $modules['coupons']) ) checked @endif type="checkbox" class="make-switch" data-on-text="Да" data-off-text="Не"
                    value="1">
            </div>

        </div>
        <div class="form-group col-md-12">
            <label class="col-md-4 control-label">Степенаст попуст:</label>
            <div class="col-md-8">
                <input name="array_modules_stepenastPopust" type="hidden" data-on-text="Да"
                    data-off-text="Не" value="0">
                <input name="array_modules_stepenastPopust" @if(isset($modules['stepenastPopust']) && $modules['stepenastPopust']) ) checked @endif type="checkbox" class="make-switch" data-on-text="Да" data-off-text="Не"
                    value="1">
            </div>

        </div>
        <div class="form-group col-md-12">
            <label class="col-md-4 control-label">Popup модал:</label>
            <div class="col-md-8">
                <input name="array_modules_popUpModal" type="hidden" data-on-text="Да"
                    data-off-text="Не" value="0">
                <input name="array_modules_popUpModal" @if(isset($modules['popUpModal']) && $modules['popUpModal']) ) checked @endif type="checkbox" class="make-switch" data-on-text="Да" data-off-text="Не"
                    value="1">
            </div>

        </div>
        <div class="form-group col-md-12">
            <label class="col-md-4 control-label">Стикери:</label>
            <div class="col-md-8">
                <input name="array_modules_stickers" type="hidden" data-on-text="Да"
                    data-off-text="Не" value="0">
                <input name="array_modules_stickers" @if(isset($modules['stickers']) && $modules['stickers']) ) checked @endif type="checkbox" class="make-switch" data-on-text="Да" data-off-text="Не"
                    value="1">
            </div>

        </div>
        <h5 class="col-md-12 control-label"> <strong>Блог:</strong> </h5>
        <div class="form-group col-md-12">
            <label class="col-md-4 control-label">Во главно мени:</label>
            <div class="col-md-8">
                <input name="array_modules_blogsMenu" type="hidden" data-on-text="Да"
                    data-off-text="Не" value="0">
                <input name="array_modules_blogsMenu" @if(isset($modules['blogsMenu']) && $modules['blogsMenu']) ) checked @endif type="checkbox" class="make-switch" data-on-text="Да" data-off-text="Не"
                    value="1">
            </div>

        </div>
        <h5 class="col-md-12 control-label"> <strong>Извештаи:</strong> </h5>
        <div class="form-group col-md-12">
            <label class="col-md-4 control-label">Во главно мени:</label>
            <div class="col-md-8">
                <input name="array_modules_izvestaiMenu" type="hidden" data-on-text="Да"
                    data-off-text="Не" value="0">
                <input name="array_modules_izvestaiMenu" @if(isset($modules['izvestaiMenu']) && $modules['izvestaiMenu']) ) checked @endif type="checkbox" class="make-switch" data-on-text="Да"
                    data-off-text="Не" value="1">
            </div>

        </div>
        <h5 class="col-md-12 control-label"> <strong>Админ:</strong> </h5>
        <div class="form-group col-md-12">
            <label class="col-md-4 control-label">Во главно мени:</label>
            <div class="col-md-8">
                <input name="array_modules_adminMenu" type="hidden" data-on-text="Да"
                    data-off-text="Не" value="0">
                <input name="array_modules_adminMenu" @if(isset($modules['adminMenu']) && $modules['adminMenu']) ) checked @endif type="checkbox" class="make-switch" data-on-text="Да" data-off-text="Не"
                    value="1">
            </div>

        </div>
        <div class="form-group col-md-12">
            <label class="col-md-4 control-label">Вработени:</label>
            <div class="col-md-8">
                <input name="array_modules_employees" type="hidden" data-on-text="Да"
                    data-off-text="Не" value="0">
                <input name="array_modules_employees" @if(isset($modules['employees']) && $modules['employees']) ) checked @endif type="checkbox" class="make-switch" data-on-text="Да" data-off-text="Не"
                    value="1">
            </div>

        </div>
        <div class="form-group col-md-12">
            <label class="col-md-4 control-label">Подесувања:</label>
            <div class="col-md-8">
                <input name="array_modules_settings" type="hidden" data-on-text="Да"
                    data-off-text="Не" value="0">
                <input name="array_modules_settings" @if(isset($modules['settings']) && $modules['settings']) ) checked @endif type="checkbox" class="make-switch" data-on-text="Да" data-off-text="Не"
                    value="1">
            </div>

        </div>
        <div class="form-group col-md-12">
            <label class="col-md-4 control-label">Дозвола за пристап:</label>
            <div class="col-md-8">
                <input name="array_modules_permisii" type="hidden" data-on-text="Да"
                    data-off-text="Не" value="0">
                <input name="array_modules_permisii" @if(isset($modules['permisii']) && $modules['permisii']) ) checked @endif type="checkbox" class="make-switch" data-on-text="Да" data-off-text="Не"
                    value="1">
            </div>

        </div>

        <h5 class="col-md-12 control-label"> <strong>Тикети:</strong> </h5>
        <div class="form-group col-md-12">
            <label class="col-md-4 control-label">Во главно мени:</label>
            <div class="col-md-8">
                <input name="array_modules_ticketsMenu" type="hidden" data-on-text="Да"
                    data-off-text="Не" value="0">
                <input name="array_modules_ticketsMenu" @if(isset($modules['ticketsMenu']) && $modules['ticketsMenu']) ) checked @endif type="checkbox" class="make-switch" data-on-text="Да"
                    data-off-text="Не" value="1">
            </div>

        </div>

        <h5 class="col-md-12 control-label"> <strong>Сервис:</strong> </h5>
        <div class="form-group col-md-12">
            <label class="col-md-4 control-label">Во главно мени:</label>
            <div class="col-md-8">
                <input name="array_modules_servisMenu" type="hidden" data-on-text="Да"
                    data-off-text="Не" value="0">
                <input name="array_modules_servisMenu" @if(isset($modules['servisMenu']) && $modules['servisMenu']) ) checked @endif type="checkbox" class="make-switch" data-on-text="Да"
                    data-off-text="Не" value="1">
            </div>

        </div>


    </div>
</div>
