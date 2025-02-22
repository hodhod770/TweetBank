<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>بنك التغريدات</title>
    
    <!-- تحميل Bootstrap و Popper -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- تحميل Alpine.js -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script> --}}
    
    <style>
        body {
            background: #f0f2f5;
            font-family: 'Tajawal', sans-serif;
        }
        .navbar {
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .nav-link {
            font-weight: 500;
            transition: all 0.3s ease-in-out;
        }
        .nav-link.active {
            font-weight: 700;
            border-bottom: 2px solid #fff;
        }
        </style>

@livewireStyles
</head>
<body>

    <div class="container">
        

            <!-- شريط التنقل مع Alpine.js للتحكم في الفئة النشطة -->
            <nav  x-data="{ activeTab: window.location.pathname }" class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">لوحة التحكم</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="تبديل التنقل">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a 
                                    href="/home" 
                                    wire:navigate
                                    @click="activeTab = '/home'" 
                                    :class="{ 'nav-link': true, 'active': activeTab === '/home' }">
                                    الرئيسية
                                </a>
                            </li>
                            <!-- رابط إدارة الحملات -->
                            <li class="nav-item">
                                <a 
                                    href="/hamlh" 
                                    wire:navigate
                                    @click="activeTab = '/hamlh'" 
                                    :class="{ 'nav-link': true, 'active': activeTab === '/hamlh' }">
                                    إدارة الحملات
                                </a>
                            </li>

                            <!-- رابط إدارة التغريدات -->
                            <li class="nav-item">
                                <a 
                                    href="/Tweets" 
                                    wire:navigate
                                    @click="activeTab = '/Tweets'" 
                                    :class="{ 'nav-link': true, 'active': activeTab === '/Tweets' }">
                                    إدارة التغريدات
                                </a>
                            </li>

                            
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- محتوى التبويبات -->
            {{$slot}}

        
    </div>

    
    @livewireScripts
    <!-- تحميل Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>
</html>
