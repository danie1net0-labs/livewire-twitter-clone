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

  <body class="font-sans antialiased h-full bg-black text-white" x-data>
    <div class="container mx-auto grid grid-cols-4 h-full">
      <!-- START LEFT MENU -->
      <div class="relative" id="parent-left-menu">
        <div class="fixed inset-y-0 mt-2 mb-3 flex flex-col justify-between space-y-3 text-[#d6d9db]" id="child-left-menu">
          <div class="flex flex-col space-y-3">
            <x-twitter.menu-item route="/" icon="logo" class="pr-3.5 pl-3.5"/>
            <x-twitter.menu-item route="/" icon="home" title="Página Inicial"/>
            <x-twitter.menu-item route="/explore" icon="explore" title="Explorar"/>
            <x-twitter.menu-item route="/community" icon="communities" title="Comunidades"/>
            <x-twitter.menu-item route="/notifications" icon="notifications" title="Notificações"/>
            <x-twitter.menu-item route="/messages" icon="messages" title="Mensagens"/>
            <x-twitter.menu-item route="/items" icon="saved-items" title="Itens Salvos"/>
            <x-twitter.menu-item route="{{ route('blue.subscribe') }}" icon="twitter-blue" title="Twitter Blue"/>
            <x-twitter.menu-item route="/verified-organization" icon="verified-org" title="Organizações verificadas"/>
            <x-twitter.menu-item route="/profile" icon="profile" title="Perfil"/>
            <x-twitter.menu-item route="/more" icon="more" title="Mais"/>

            <x-buttons.tweet class="mr-12">
              Twettar
            </x-buttons.tweet>
          </div>

          <div class="bg-transparent hover:bg-gray-200 hover:bg-opacity-10 rounded-full p-3 flex items-center space-x-3 mr-3">
            <img src="{{  Vite::asset('resources/images/avatar.png') }}" alt="User avatar" class="w-10 h-10 rounded-full">

            <div class="flex flex-col flex-1">
              <div class="text-base text-[#e7e9ea] font-semibold">{{ auth()->user()->name }}</div>
              <div class="text-base text-[#71767b]">@username</div>
            </div>

            <x-icons.dots class="w-6 fill-[#d6d9db]"/>
          </div>
        </div>
      </div>
      <!-- END LEFT MENU -->

      <!-- START CENTER -->
      <div class="col-span-2 border-x-[0.625px] border-lines relative">
        <div class="sticky top-0 w-full backdrop-blur-xl">
          <div class="flex-1 m-2">
            <h2 class="px-4 py-2 text-xl font-semibold text-white">Página Inicial</h2>
          </div>

          <ul class="w-full grid grid-cols-2 text-center font-bold text-gray-500 border-b-[0.625px] border-lines">
            <li class="pt-4 cursor-pointer hover:bg-neutral-900 flex justify-center">
              <div class="border-b-4 w-fit pb-3 text-white border-twitter">
                Para você
              </div>
            </li>

            <li class="pt-4 cursor-pointer hover:bg-neutral-900 flex justify-center">
              <div class="border-b-4 w-fit pb-3 border-transparent">
                Seguindo
              </div>
            </li>
          </ul>
        </div>

        <div class="border-b-[0.625px] border-lines py-2 w-full z-0">
          <livewire:tweet.create/>
        </div>

        <div class="text-center text-twitter text-sm py-4 bg-transparent hover:bg-opacity-20 hover:bg-gray-900 cursor-pointer">
          Mostrar 245 Tweets
        </div>

        <livewire:tweet.timeline/>
      </div>
      <!-- END CENTER -->

      <!-- START RIGHT MENU -->
      <div>
        <div class="pl-6 space-y-6">
          <div class="mt-2 flex relative">
            <x-icons.search class="absolute mt-[15px] ml-5 w-5 fill-neutral-500"/>

            <input
              type="text"
              placeholder="Buscar no Twitter"
              class="bg-[#202327] rounded-full focus:outline-none shadow h-12 px-14 border-none w-full"
            >
          </div>

          <div class="rounded-2xl min-h-40 pt-5 bg-[#16181c]">
            <div class="font-extrabold text-xl mb-6 px-4">
              O que está acontecendo
            </div>

            <div>
              <x-twitter.whats-happening
                topic="Tecnologia · Assunto do Momento"
                title="Tailwind CSS"
                count="1234"
              />

              <x-twitter.whats-happening
                topic="Tecnologia · Assunto do Momento"
                title="Alpine JS"
                count="3122"
              />

              <x-twitter.whats-happening
                topic="Tecnologia · Assunto do Momento"
                title="Laravel"
                count="7565"
              />

              <x-twitter.whats-happening
                topic="Tecnologia · Assunto do Momento"
                title="Livewire"
                count="4235"
              />

              <div class="px-5 py-5 cursor-pointer hover:bg-neutral-800 rounded-b-xl text-twitter text-sm">
                Mostrar mais
              </div>
            </div>
          </div>

          <div class="rounded-2xl min-h-40 pt-5 bg-[#16181c]">
            <div class="font-extrabold text-xl mb-6 px-5">
              Quem seguir
            </div>

            <div>
              <x-twitter.who-follow
                name="Tailwind CSS"
                username="@tailwindcss"
              />

              <x-twitter.who-follow
                name="Alpine JS"
                username="@Alpine_JS"
              />

              <x-twitter.who-follow
                name="Laravel"
                username="@laravelphp"
              />

              <x-twitter.who-follow
                name="Livewire"
                username="@LaravelLivewire"
              />

              <div class="px-4 py-4 cursor-pointer hover:bg-neutral-800 rounded-b-xl text-twitter text-sm">
                Mostrar mais
              </div>
            </div>
          </div>

          <div class="text-xs text-[#71767b] flex gap-2 flex-wrap pl-4 pb-5">
            <a href="#" class="hover:underline">Termos de Servico</a>
            <a href="#" class="hover:underline">Politica de Privacidade</a>
            <a href="#" class="hover:underline">Politica de cookies</a>
            <a href="#" class="hover:underline">Acessibilidade</a>
            <a href="#" class="hover:underline">Informacoes de anuncios</a>
            <a href="#" class="hover:underline flex items-center ">
              Mais <x-icons.dots class="ml-1 h-4 fill-gray-500" />
            </a>

            <span>© {{ date('Y') }} X Corp.</span>
          </div>
        </div>
      </div>
      <!-- END RIGHT MENU -->
    </div>

    @livewireScripts
  </body>

  <script>
    const parentLeftMenu = document.getElementById('parent-left-menu');
    const childLeftMenu = document.getElementById('child-left-menu');

    childLeftMenu.style.width = `${parentLeftMenu.offsetWidth}px`;
  </script>
</html>
