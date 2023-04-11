<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
  </head>

  <body class="font-sans antialiased h-full bg-black text-white">
    <div class="container mx-auto grid grid-cols-4 h-full">
      <div class="mt-2 mb-3 flex flex-col justify-between space-y-3 text-[#d6d9db]">
        <div class="flex flex-col space-y-3">
          <x-menu.item route="/" icon="logo" class="pr-3.5 pl-3.5"/>
          <x-menu.item route="/" icon="home" title="Página Inicial"/>
          <x-menu.item route="/explore" icon="explore" title="Explorar"/>
          <x-menu.item route="/community" icon="communities" title="Comunidades"/>
          <x-menu.item route="/notifications" icon="notifications" title="Notificações"/>
          <x-menu.item route="/messages" icon="messages" title="Mensagens"/>
          <x-menu.item route="/items" icon="saved-items" title="Itens Salvos"/>
          <x-menu.item route="/blue" icon="twitter-blue" title="Twitter Blue"/>
          <x-menu.item route="/profile" icon="profile" title="Perfil"/>
          <x-menu.item route="/more" icon="more" title="Mais"/>

          <button class="bg-[#1d9bf0] text-lg text-white font-semibold rounded-full text-center py-4 mr-12">
            Twettar
          </button>
        </div>

        <div class="bg-transparent hover:bg-gray-200 hover:bg-opacity-10 rounded-full p-3 flex items-center space-x-3 mr-3">
          <img src="{{  Vite::asset('resources/images/avatar.png') }}" alt="Laravel Logo" class="w-10 h-10 rounded-full">

          <div class="flex flex-col flex-1">
            <div class="text-base text-[#e7e9ea] font-semibold">User</div>
            <div class="text-base text-[#71767b]">@user</div>
          </div>

          <x-icons.dots class="w-6 fill-[#d6d9db]"/>
        </div>
      </div>

      <div class="col-span-2 border-x-[0.65px] border-gray-600">

      </div>

      <div>

      </div>
    </div>

    @livewireScripts
  </body>
</html>
