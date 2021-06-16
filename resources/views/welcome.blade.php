<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $app->brand_name }}</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/landing.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>
<body>
    <div id="app" x-data="{
        sidebarShow:false
    }">
        <div class="sidebar animate__animated" :class="!sidebarShow ? 'animate__bounceOutLeft':'animate__bounceInLeft'">
            <ul>
                <li>
                    <a href="#" onclick="alert('comming soon')">About Us</a>
                </li>
                <li>
                    <a href="#" onclick="alert('comming soon')">Contact Us</a>
                </li>
                <li>
                    <a href="{{ route('login') }}">Login</a>
                </li>
                <li>
                    <a href="{{ route('register') }}">Register</a>
                </li>
                <li>
                    <a href="#" x-on:click.prevent="sidebarShow = !sidebarShow" class="button is-rounded">
                        <i data-feather="x" ></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class=" fixedme p-2">
            <button x-on:click="sidebarShow = !sidebarShow" class="no-border button is-rounded">
                <i data-feather="menu"
                x-show="!sidebarShow"></i>
                <i data-feather="x"
                x-show="sidebarShow"></i>
            </button>
        </div>
        <div class="container mobile" >
            <div id="mobile-hero">
                <h1 class="title is-2">
                    {{ $app->brand_name }}
                </h1>
                <h2 class="subtitle is-5">
                    {{ $app->brand_saying }}
                </h2>
                <a href="#" id="app_btn" class="button is-rounded is-info" >
                    Book An Appointment
                </a>
            </div>
            <div class="block">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cupiditate nesciunt repellat fuga voluptates eos cumque nostrum odio sed. Dolorem illum odio molestias omnis similique quis? Alias dignissimos provident dicta eius debitis, eveniet cum quaerat. Animi incidunt inventore, cumque officia optio sit magnam sint nesciunt? Quisquam vel, pariatur molestiae fugiat obcaecati dolores dolorem ipsa reprehenderit eius dolore sunt unde consectetur impedit. Cumque ea sunt numquam suscipit doloremque vel impedit atque perspiciatis natus quisquam repudiandae quas saepe, voluptas magni repellat vero dolores voluptate et nihil, libero quae ab inventore qui. Praesentium quos sed modi dicta cumque assumenda fugiat eveniet culpa nobis. Sapiente, iusto! Quae velit ratione odio similique fugit, accusamus, placeat, vero expedita quidem optio pariatur esse laudantium dolor eum molestiae unde quia blanditiis voluptates minus consectetur deserunt nostrum impedit officia? Atque, adipisci! Consectetur, dicta dolore. Magni excepturi ipsum consequatur ratione atque accusantium est asperiores facilis error eaque architecto, sunt, voluptas veniam. Obcaecati similique commodi repellendus et, odit pariatur? Dignissimos fuga adipisci voluptates, libero eum vel expedita blanditiis error magnam nostrum reprehenderit quo accusamus harum maiores nulla voluptatum, similique ratione eius placeat et optio fugiat est! Cumque cum ex repudiandae saepe consectetur impedit, dignissimos voluptatibus recusandae ullam praesentium hic, odit obcaecati. Magni omnis veniam unde aliquid laboriosam! Perferendis illum ad minima, voluptatum nisi numquam quidem animi repellendus aut esse, accusantium labore ducimus sint sit veritatis voluptate porro quae laboriosam molestiae. Libero nam in aperiam fugiat voluptatem labore aspernatur ipsum dolor, accusamus delectus odit perspiciatis ad eius recusandae vero nihil ipsam fuga dicta fugit non ut? Incidunt nostrum debitis itaque beatae rem velit quos nobis harum distinctio, doloribus asperiores qui aspernatur, fugit non. Omnis, cumque. Aliquid qui blanditiis, repellendus suscipit praesentium nesciunt molestiae quas enim voluptatibus odio possimus rem ipsam repellat ipsa nulla explicabo provident doloribus nobis ab rerum. Cumque aliquid velit consectetur.
            </div>
    
            
        </div>
    </div>
    <script src="/js/app.js" defer></script>
    <script src="/js/feather_init.js" defer></script>
</body>
</html>