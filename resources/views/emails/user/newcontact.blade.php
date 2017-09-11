@component('mail::message')
# Te ha contactado un Usuario

Hola te ha contactado un **Usuario, ponete en contacto con el lo mas rápido.posible.

{{-- pasar datos de usuario por aca --}}
Usuario: {{ Auth::user()->first_name }}
Email: {{ Auth::user()->email }}

@component('mail::button', ['url' => 'http://www.soymiplanner.com'])
Ingresá al Sitio
@endcomponent

Gracias,<br>
Equipo Soy Mi Planner
@endcomponent
