
@if(\Entrust::hasRole('admin'))
    <p>This is visible to users with the admin role. Gets translated to 
    </p>

@endif

@if(\Entrust::can('edit-user'))

    <p>This is visible to users with the given permissions. Gets translated to 
    . The  directive is already taken by core 
    laravel authorization package, hence the @permission directive instead.</p>
@endif
