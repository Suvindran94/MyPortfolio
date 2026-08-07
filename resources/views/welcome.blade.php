<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suvindran - Portfolio</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="css/master.css">
    <link href="https://fonts.googleapis.com/css?family=Lato|Roboto" rel="stylesheet">
    <link href="https://cdn.materialdesignicons.com/2.0.46/css/materialdesignicons.min.css" rel="stylesheet">
     <script src="https://cdn.jsdelivr.net/npm/platform@1.3.6/platform.js"></script>
     <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<style>
.myimage {
    height: 400px !important;
}

@media only screen and (max-width: 767px) {
    .myimage {
        height: 225px !important; /* Adjust this value as needed for mobile devices */
    }
}

    /* Add a max-height and overflow-y: auto to enable vertical scrolling */
.modal-images {
    max-height: 480px; /* Adjust the maximum height as needed */
    overflow-y: scroll;
}

/* Ensure images inside .modal-images do not exceed the container's width */
.modal-images img {
    max-width: 100%; /* Ensure images don't exceed container width */
    height: auto; /* Maintain aspect ratio */
}

/* Portfolio image cards */
.portfolio-card-wrap {
    margin-bottom: 22px;
}
.portfolio-card {
    display: block;
    background: #fff;
    border: 1px solid rgba(0,0,0,.08);
    border-radius: 10px;
    overflow: hidden;
    cursor: pointer;
    transition: box-shadow .25s ease, transform .25s ease, border-color .25s ease;
    height: 100%;
    text-align: left;
}
.portfolio-card:hover,
.portfolio-card:focus {
    box-shadow: 0 10px 28px rgba(0,0,0,.12);
    border-color: rgba(0,0,0,.14);
    transform: translateY(-2px);
    outline: none;
}
.portfolio-card-media {
    position: relative;
    aspect-ratio: 16 / 10;
    background: #eceff3;
    overflow: hidden;
}
.portfolio-card-media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform .45s ease;
}
.portfolio-card:hover .portfolio-card-media img {
    transform: scale(1.06);
}
.portfolio-card-overlay {
    position: absolute;
    inset: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(20, 24, 32, .42);
    opacity: 0;
    transition: opacity .25s ease;
}
.portfolio-card:hover .portfolio-card-overlay,
.portfolio-card:focus .portfolio-card-overlay {
    opacity: 1;
}
.portfolio-card-view {
    color: #fff;
    background: rgba(255,255,255,.16);
    border: 1px solid rgba(255,255,255,.55);
    padding: 8px 14px;
    border-radius: 6px;
    font-size: 13px;
    letter-spacing: .02em;
}
.portfolio-card-body {
    padding: 14px 16px 16px;
}
.portfolio-card-title {
    font-size: 16px;
    font-weight: 600;
    margin: 0 0 6px;
    line-height: 1.35;
    color: #222;
}
.portfolio-card-meta {
    font-size: 13px;
    opacity: .75;
    margin: 0 0 10px;
}
.portfolio-card-footer {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
    align-items: center;
}
.portfolio-card-badge {
    display: inline-block;
    font-size: 12px;
    padding: 4px 8px;
    background: rgba(0,0,0,.06);
    border-radius: 5px;
    color: #444;
}
/* Portfolio modal */
#portfolio-modal .modal-dialog {
    width: min(920px, 94vw);
    margin: 24px auto;
}
#portfolio-modal .modal-content {
    border-radius: 12px;
    overflow: hidden;
}
#portfolio-modal .modal-body {
    display: block !important;
    padding: 24px;
    max-height: calc(100vh - 48px);
    overflow-y: auto;
    -webkit-overflow-scrolling: touch;
}
#portfolio-modal .modal-close {
    position: absolute;
    top: 14px;
    right: 16px;
    z-index: 2;
    font-size: 28px;
    line-height: 1;
    opacity: .55;
    background: none;
    border: 0;
    padding: 0;
    cursor: pointer;
}
#portfolio-modal .modal-close:hover { opacity: 1; }
#portfolio-modal .modal-title {
    margin-bottom: 8px;
    padding-right: 28px;
}
#portfolio-modal .modal-title h1 {
    font-size: 28px;
    margin: 0;
    line-height: 1.3;
}
#portfolio-modal .modal-description {
    margin-bottom: 16px;
    opacity: .85;
}
#portfolio-modal .about-me-info {
    margin-bottom: 18px;
}
#portfolio-modal .modal-images {
    display: grid;
    grid-template-columns: 1fr;
    gap: 12px;
    margin-bottom: 18px;
}
#portfolio-modal .modal-images img {
    width: 100%;
    height: auto;
    border-radius: 8px;
    border: 1px solid rgba(0,0,0,.06);
    margin: 0;
    background: #f4f5f7;
}
#portfolio-modal .modal-images .modal-pdf-wrap {
    grid-column: 1 / -1;
    border-radius: 8px;
    border: 1px solid rgba(0,0,0,.08);
    overflow: hidden;
    background: #f4f5f7;
}
#portfolio-modal .modal-images .modal-pdf-frame {
    display: block;
    width: 100%;
    height: min(72vh, 820px);
    border: 0;
    background: #fff;
}
#portfolio-modal .modal-loading,
#portfolio-modal .modal-empty-shots {
    padding: 18px;
    text-align: center;
    opacity: .7;
}
#portfolio-modal .about-btns {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-top: 4px;
}

@media (min-width: 768px) {
    #portfolio-modal .modal-images {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
    #portfolio-modal .modal-images img:only-child,
    #portfolio-modal .modal-images img:first-child:nth-last-child(1) {
        grid-column: 1 / -1;
    }
}

@media (max-width: 767px) {
    .portfolio-card-overlay { display: none; }
    .portfolio-card-title { font-size: 15px; }
    #portfolio-modal .modal-dialog {
        width: 100%;
        margin: 0;
    }
    #portfolio-modal .modal-content {
        border-radius: 0;
        min-height: 100vh;
    }
    #portfolio-modal .modal-body {
        padding: 18px 16px 28px;
        max-height: 100vh;
    }
    #portfolio-modal .modal-title h1 {
        font-size: 22px;
    }
    .portfolio-sort ul li {
        display: inline-block;
        margin: 0 12px 10px 0 !important;
    }
}

/* Skills — clean inline list (matches site template) */
#skills .skill-group {
    margin-bottom: 28px;
}
#skills .skill-group h4 {
    margin: 0 0 12px;
    font-size: 18px;
    line-height: 1.4;
}
#skills .skill-inline {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    flex-wrap: wrap;
    gap: 10px 20px;
}
#skills .skill-inline li {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    font-size: 14px;
    line-height: 1.35;
    color: #666;
}
#skills .skill-inline img {
    width: 16px;
    height: 16px;
    object-fit: contain;
    flex-shrink: 0;
}
#skills .skill-group-divider {
    border: 0;
    border-top: 1px solid #efefef;
    margin: 8px 0 28px;
}
@media (max-width: 767px) {
    #skills .skill-group {
        margin-bottom: 22px;
    }
    #skills .skill-group h4 {
        font-size: 16px;
        margin-bottom: 10px;
    }
    #skills .skill-inline {
        gap: 8px 14px;
    }
    #skills .skill-inline li {
        font-size: 13px;
    }
}

.footer .copyright p {
    margin: 0;
}
.footer .footer-stack {
    margin-top: 6px;
    font-size: 13px;
    opacity: 0.75;
    letter-spacing: 0.02em;
}
</style>
<body>

<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-xs-8 slideInLeft">
                <div class="logo">
                    <span class="point">Suvindran</span>
                </div>
            </div>
            <div class="col-md-9 hidden-sm hidden-xs slideInRight">
                <div class="main-menu">
                    <ul class="list-inline">
                        <li><a href="#hello">Main</a></li>
                        <li><a href="#skills">Skills</a></li>
                        <li><a href="#experience">Experience</a></li>
                        <li><a href="#education">Education</a></li>
                        <li><a href="#accomplishments">Accomplishments</a></li>
                        <li><a href="#certifications">Certifications</a></li>
                        <li><a href="#portfolio">Portfolio</a></li>
             
                        <li><a href="#contact">Contact me</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xs-4 hidden-lg hidden-md slideInRight">
                <div class="mobile-btn">
                    <span><i class="mdi mdi-menu" aria-hidden="true"></i></span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Mobile menu -->
<div class="mob-menu-wrapper hidden-md hidden-lg">
    <div class="close-mob-menu">
        <span><i class="mdi mdi-close" aria-hidden="true"></i></span>
    </div>
    <div class="mobile-menu">
        <ul>
            <li><a href="#hello">Main</a></li>
            <li><a href="#skills">Skills</a></li>
            <li><a href="#experience">Experience</a></li>
            <li><a href="#education">Education</a></li>
            <li><a href="#accomplishments">Accomplishments</a></li>
            <li><a href="#certifications">Certifications</a></li>
            <li><a href="#portfolio">Portfolio</a></li>

            <li><a href="#contact">Contact me</a></li>
        </ul>
    </div>
</div>
<!-- Mobile menu -->

<section id="hello" class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 about-img-wrap">
                <div class="about-img wow slideInRight">
                    <img src="media/hello-section/myimage.png" alt="Suvindran Ravindran - Senior Software Engineer" class="img-responsive myimage" style="height: 100%;">
                </div>
              
            </div>
            <div class="col-md-6">
                <div class="about-me wow slideInLeft">
                    <div class="about-me-title" style="padding-top:20px;">
                        <h1><span class="point">I am Suvindran Ravindran</span></h1>
                    </div>
                    <div class="about-me-text">
                        <div class="opacity-box">
                            <p>I am a Senior Software Engineer (Executive) based in Ipoh, Perak, with 6+ years building and maintaining full-stack and mobile solutions. I specialise in Laravel, IERP systems, and cross-platform mobile apps. Open to remote or hybrid opportunities.</p>
                        </div>
                    </div>
                    <div class="about-me-info">
                    <p>
    <span class="span-title">Phone</span>
    <span><a href="tel:+601136096401">+60 1136096401</a></span>
</p>
<p>
    <span class="span-title">Email</span>
    <span><a href="mailto:suvindran94@gmail.com">suvindran94@gmail.com</a></span>
</p>

                        <p>
                            <span class="span-title">Address</span>
                            <span>Desa Pengkalan Bersatu, 31500 Lahat Perak.</span>
                        </p>
                        <p>
    <span class="span-title">Device</span>
    <span><a href="https://www.apple.com/macbook-pro/" target="_blank" rel="noopener"> Macbook Pro M1</a></span>
</p>

                        <p>
                            <span class="span-title">Social</span>
                            <span class="span-icons">
                                <a target="_blank" href="https://www.facebook.com/suvin94/" class="mdi fonts-icons mdi-facebook"></a>
                                <a target="_blank" href="https://x.com/suvindran94" class="mdi fonts-icons mdi-twitter"></a>
                                <a target="_blank" href="https://www.instagram.com/i.am.suvin/" class="mdi fonts-icons mdi-instagram"></a>
                                <a target="_blank" href="https://www.linkedin.com/in/suvindran-ravindran-449285214/" class="mdi fonts-icons mdi-linkedin"></a>
                                <a target="_blank" href="https://github.com/Suvindran94" class="mdi fonts-icons mdi-github-circle"></a>
                            </span>
                        </p>
                    </div>
                    <div class="about-btns">
                        <a data-toggle="modal" data-target="#contact-modal" href="#" class="site-btn">Contact me</a>
                        <a href="./download/SuvindransResume.pdf" target="_blank" class="site-btn gray-btn">Download cv</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="skills" class="section">
    <div class="container">
        <div class="row wave-bg">
            <div class="zigzag wow slideInLeft">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 105 20" xml:space="preserve">
                    <g>
                        <rect class="st0" width="105" height="20"/>
                        <g>
                            <polyline class="st1" points="2.5,5 16.8,15 31.1,5 45.3,15 59.6,5 73.9,15 88.2,5 102.5,15   "/>
                        </g>
                    </g>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 105 20" xml:space="preserve">
                    <g>
                        <rect class="st0" width="105" height="20"/>
                        <g>
                            <polyline class="st1" points="2.5,5 16.8,15 31.1,5 45.3,15 59.6,5 73.9,15 88.2,5 102.5,15   "/>
                        </g>
                    </g>
                </svg>
            </div>
            <div class="col-md-4 wow slideInLeft">
                <div class="section-sidebar">
                    <h2><span class="point">Skills</span></h2>
                    <div class="opacity-box">
                        <p>I focus on full-stack and mobile development, clear communication, and shipping maintainable code. I enjoy working with teams who care about quality and user impact.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                @php
                    $si = fn (string $slug, string $color = '111111') => "https://cdn.simpleicons.org/{$slug}/{$color}";
                    $di = fn (string $path) => "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/{$path}";
                    $fav = fn (string $domain) => "https://www.google.com/s2/favicons?domain={$domain}&sz=64";
                    $skillGroups = [
                        'Web Development' => [
                            ['PHP', $si('php', '777BB4')],
                            ['Laravel', $si('laravel', 'FF2D20')],
                            ['CodeIgniter', $si('codeigniter', 'EF4223')],
                            ['Livewire', $si('livewire', 'FB70A9')],
                            ['Python', $si('python', '3776AB')],
                            ['Composer', $si('composer', '885630')],
                            ['Blade', $si('laravel', 'FF2D20')],
                            ['Eloquent', $si('laravel', 'FF2D20')],
                            ['REST APIs', $si('swagger', '85EA2D')],
                        ],
                        'Frontend Development' => [
                            ['HTML5', $si('html5', 'E34F26')],
                            ['CSS3', $si('css', '1572B6')],
                            ['JavaScript', $si('javascript', 'F7DF1E')],
                            ['TypeScript', $si('typescript', '3178C6')],
                            ['Vue.js', $si('vuedotjs', '4FC08D')],
                            ['React', $si('react', '61DAFB')],
                            ['Bootstrap', $si('bootstrap', '7952B3')],
                            ['Tailwind CSS', $si('tailwindcss', '06B6D4')],
                            ['jQuery', $si('jquery', '0769AD')],
                            ['CSS Grid', $si('css', '1572B6')],
                            ['Flexbox', $si('css', '1572B6')],
                            ['AJAX', $si('javascript', 'F7DF1E')],
                            ['Responsive Design', $si('googlechrome', '4285F4')],
                        ],
                        'Mobile Development' => [
                            ['React Native', $si('react', '61DAFB')],
                            ['Flutter', $si('flutter', '02569B')],
                            ['Expo', $si('expo', '000020')],
                            ['Android Studio', $si('androidstudio', '3DDC84')],
                        ],
                        'UI / UX Design' => [
                            ['Photoshop', $di('photoshop/photoshop-plain.svg')],
                            ['Figma', $si('figma', 'F24E1E')],
                            ['Canva', $di('canva/canva-original.svg')],
                            ['Proto.io', $fav('proto.io')],
                            ['Photopea', $si('photopea', '18A497')],
                            ['JustInMind', $fav('justinmind.com')],
                        ],
                        'Database' => [
                            ['MySQL', $si('mysql', '4479A1')],
                            ['Supabase', $si('supabase', '3FCF8E')],
                            ['Firebase', $si('firebase', 'FFCA28')],
                            ['SQL Server', $di('microsoftsqlserver/microsoftsqlserver-plain.svg')],
                        ],
                        'Reporting & Plugins' => [
                            ['Chart.js', $si('chartdotjs', 'FF6384')],
                            ['Tableau', 'https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/tableau.svg'],
                            ['KoolReport', $fav('koolreport.com')],
                            ['Spatie', $fav('spatie.be')],
                            ['mPDF', $fav('mpdf.github.io')],
                            ['DomPDF', $si('laravel', 'FF2D20')],
                            ['Telescope', $si('laravel', 'FF2D20')],
                        ],
                        'Payment Gateways' => [
                            ['Stripe', $si('stripe', '635BFF')],
                            ['ToyyibPay', $fav('toyyibpay.com')],
                        ],
                        'Hosting & Deployment' => [
                            ['Hostinger', $si('hostinger', '673DE6')],
                            ['Vercel', $si('vercel', '000000')],
                            ['cPanel', $si('cpanel', 'FF6C2C')],
                            ['Plesk', $si('plesk', '52BBEF')],
                            ['DirectAdmin', $fav('directadmin.com')],
                            ['Git', $si('git', 'F05032')],
                            ['GitHub', $si('github', '181717')],
                        ],
                        'AI Development Tools' => [
                            ['Cursor', $si('cursor', '000000')],
                            ['GitHub Copilot', $si('githubcopilot', '000000')],
                        ],
                        'Others' => [
                            ['Visual Basic', $di('visualstudio/visualstudio-plain.svg')],
                        ],
                    ];
                    $groupIndex = 0;
                @endphp
                <div class="row">
                    @foreach($skillGroups as $groupTitle => $skills)
                        @php $groupIndex++; @endphp
                        <div class="col-md-6 wow zoomIn">
                            @if($groupIndex > 2)
                                <hr class="skill-group-divider">
                            @elseif($groupIndex === 2)
                                <hr class="mobile-hr skill-group-divider">
                            @endif
                            <div class="advantages-box skill-group">
                                <h4>{{ $groupTitle }}</h4>
                                <ul class="skill-inline">
                                    @foreach($skills as [$label, $icon])
                                        <li>
                                            <img src="{{ $icon }}" alt="" loading="lazy" onerror="this.style.display='none'">
                                            <span>{{ $label }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section id="experience" class="section">
    <div class="container">
        <div class="row wave-bg">
            <div class="zigzag wow slideInLeft">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 105 20" xml:space="preserve">
                    <g>
                       <rect class="st0" width="105" height="20"/>
                        <g>
                            <polyline class="st1" points="2.5,5 16.8,15 31.1,5 45.3,15 59.6,5 73.9,15 88.2,5 102.5,15   "/>
                        </g>
                    </g>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 105 20" xml:space="preserve">
                    <g>
                        <rect class="st0" width="105" height="20"/>
                        <g>
                            <polyline class="st1" points="2.5,5 16.8,15 31.1,5 45.3,15 59.6,5 73.9,15 88.2,5 102.5,15   "/>
                        </g>
                    </g>
                </svg>
            </div>
            <div class="col-md-4 wow slideInLeft">
                <div class="section-sidebar">
                    <h2><span class="point">Experience</span></h2>
                    <div class="opacity-box">
                        <p>I have strong experience working independently and in teams. I have led a team of six—guiding technical decisions, code reviews, and delivery—and I focus on continuous learning and sharing knowledge with colleagues.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8 right-box">
                <div class="row wow zoomIn">
                    <div class="col-md-12">
                        <div class="about-row">
                            <h4 class="about-title">Senior Software Engineer (Executive)</h4>
                            <p class="about-info">Polyware Sdn Bhd</p>
                            <p>Jan 2026 — Present</p>
                            <div class="opacity-box">
                                <p>Maintain and enhance the company IERP system; gather user feedback and drive improvements; handle support tickets and version control via GitHub; implement CI/CD pipelines for automated deployments; fix bugs and deliver new production modules—including a real-time dashboard for operator performance; upgrade legacy Laravel applications; maintain and extend the mobile app; present KPIs to Head of Department.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <hr>
                <div class="row wow zoomIn">
                    <div class="col-md-12">
                        <div class="about-row">
                            <h4 class="about-title">Project Manager</h4>
                            <p class="about-info">Polyware Sdn Bhd</p>
                            <p>Oct 2023 — Dec 2025</p>
                            <div class="opacity-box">
                                <p>Assigned tasks to team members; reviewed and merged GitHub pull requests; monitored project progress; set up and maintained CI/CD pipelines for automated deployments; deployed systems and enhancements to live servers; managed domains, subdomains, and GitHub accounts; developed and enhanced systems; supported and resolved software-related tickets.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <hr>
                <div class="row wow zoomIn">
                    <div class="col-md-12">
                        <div class="about-row">
                            <h4 class="about-title">Software Engineer</h4>
                            <p class="about-info">Polyware Sdn Bhd</p>
                            <p>Dec 2019 — Sep 2023</p>
                            <div class="opacity-box">
                                <p>Developed web-based ERP system using PHP Laravel framework and MySQL; managed domains and subdomains; handled pull requests and CI/CD deployments to live servers; supported software-related tickets; maintained existing systems; assigned tasks and assisted team members technically; arranged UAT and functional testing; developed and maintained RESTful APIs.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <hr>
                <div class="row wow zoomIn">
                    <div class="col-md-12">
                        <div class="about-row">
                            <h4 class="about-title">Internship - Software Engineering</h4>
                            <p class="about-info">Polyware Sdn Bhd</p>
                            <p>Jul 2019 — Dec 2019</p>
                            <div class="opacity-box">
                                <p>Studied and presented PHP framework for ERP System, developed ERP system from scratch using Laravel framework, developed sub-modules of ERP system, presented the developed system to top management, fixed errors and bugs, launched developed system for staff use.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <hr>
                <div class="row wow zoomIn">
                    <div class="col-md-12">
                        <div class="about-row">
                            <h4 class="about-title">Internship - IT Helpdesk</h4>
                            <p class="about-info">Carsem (M) Sdn. Bhd</p>
                            <p>June 2016 — Nov 2016</p>
                            <div class="opacity-box">
                                <p>Resolved hardware issues and staff support calls; set up new PCs with Windows and disk cloning for standardised software; troubleshooted network issues.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="education" class="section">
    <div class="container">
        <div class="row wave-bg">
            <div class="zigzag wow slideInLeft">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 105 20" xml:space="preserve">
                    <g>
                        <rect class="st0" width="105" height="20"/>
                        <g>
                            <polyline class="st1" points="2.5,5 16.8,15 31.1,5 45.3,15 59.6,5 73.9,15 88.2,5 102.5,15   "/>
                        </g>
                    </g>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 105 20" xml:space="preserve">
                    <g>
                        <rect class="st0" width="105" height="20"/>
                        <g>
                            <polyline class="st1" points="2.5,5 16.8,15 31.1,5 45.3,15 59.6,5 73.9,15 88.2,5 102.5,15   "/>
                        </g>
                    </g>
                </svg>
            </div>
            <div class="col-md-4 wow slideInLeft">
                <div class="section-sidebar">
                    <h2><span class="point">Education</span></h2>
                    <div class="opacity-box">
                        <p>All my life I have been driven by my strong belief that education
                            is important. I try to learn something new every single day.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8 right-box">
                <div class="row wow zoomIn">
                    <div class="col-md-12">
                        <div class="about-row">
                            <h4 class="about-tittle">BSc (Hons) Software Engineering
                                (Information System Development)</h4>
                            <p class="about-info">Universiti Kebangsaan Malaysia</p>
                            <p>2017 — 2020</p>
                            <div class="opacity-box">
                                <p>CGPA: 3.45</p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row wow zoomIn">
                    <div class="col-md-12">
                        <div class="about-row">
                            <h4 class="about-tittle">Diploma in Information
                                Technology(Programming)</h4>
                            <p class="about-info">Politeknik Premier Ungku Omar</p>
                            <p>2013 -2016</p>
                            <div class="opacity-box">
                                <p>CGPA: 3.15</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="accomplishments" class="section">
    <div class="container">
        <div class="row wave-bg">
            <div class="zigzag wow slideInLeft">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 105 20" xml:space="preserve">
                    <g>
                        <rect class="st0" width="105" height="20"/>
                        <g>
                            <polyline class="st1" points="2.5,5 16.8,15 31.1,5 45.3,15 59.6,5 73.9,15 88.2,5 102.5,15   "/>
                        </g>
                    </g>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 105 20" xml:space="preserve">
                    <g>
                        <rect class="st0" width="105" height="20"/>
                        <g>
                            <polyline class="st1" points="2.5,5 16.8,15 31.1,5 45.3,15 59.6,5 73.9,15 88.2,5 102.5,15   "/>
                        </g>
                    </g>
                </svg>
            </div>
            <div class="col-md-4 wow slideInLeft">
                <div class="section-sidebar">
                    <h2><span class="point">Accomplishments</span></h2>
                    <div class="opacity-box">
                        <p>Recognition for academic and project excellence.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8 right-box">
                <div class="row wow zoomIn">
                    <div class="col-md-12">
                        <div class="about-row">
                            <h4 class="about-title">Supervisor Recognition SURE 2019</h4>
                            <p class="about-info">Faculty of Information Science &amp; Technology, UKM</p>
                            <p>2019</p>
                            <div class="opacity-box">
                                <p>Top 50 Final Year Project SURE Medal 2019 UKM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="certifications" class="section">
    <div class="container">
        <div class="row wave-bg">
            <div class="zigzag wow slideInLeft">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 105 20" xml:space="preserve">
                    <g>
                        <rect class="st0" width="105" height="20"/>
                        <g>
                            <polyline class="st1" points="2.5,5 16.8,15 31.1,5 45.3,15 59.6,5 73.9,15 88.2,5 102.5,15   "/>
                        </g>
                    </g>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 105 20" xml:space="preserve">
                    <g>
                        <rect class="st0" width="105" height="20"/>
                        <g>
                            <polyline class="st1" points="2.5,5 16.8,15 31.1,5 45.3,15 59.6,5 73.9,15 88.2,5 102.5,15   "/>
                        </g>
                    </g>
                </svg>
            </div>
            <div class="col-md-4 wow slideInLeft">
                <div class="section-sidebar">
                    <h2><span class="point">Certifications</span></h2>
                    <div class="opacity-box">
                        <p>Final Year Project certificates from UKM.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8 right-box">
                <div class="row wow zoomIn">
                    <div class="col-md-12">
                        <div class="about-row">
                            <h4 class="about-title">Potential for Commercialization UKM</h4>
                            <p class="about-info">Final Year Project Certificate of Recognition, FTSM UKM</p>
                            <p>Sep 2019</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row wow zoomIn">
                    <div class="col-md-12">
                        <div class="about-row">
                            <h4 class="about-title">Potential for Intellectual Property Protection UKM</h4>
                            <p class="about-info">Final Year Project Certificate of Recognition, FTSM UKM</p>
                            <p>Sep 2019</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="portfolio" class="section section-small-padding">
    <div class="container">
        <div class="row wave-bg">
            <div class="zigzag wow slideInLeft">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 105 20" xml:space="preserve">
                    <g>
                        <rect class="st0" width="105" height="20"/>
                        <g>
                            <polyline class="st1" points="2.5,5 16.8,15 31.1,5 45.3,15 59.6,5 73.9,15 88.2,5 102.5,15   "/>
                        </g>
                    </g>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 105 20" xml:space="preserve">
                    <g>
                        <rect class="st0" width="105" height="20"/>
                        <g>
                            <polyline class="st1" points="2.5,5 16.8,15 31.1,5 45.3,15 59.6,5 73.9,15 88.2,5 102.5,15   "/>
                        </g>
                    </g>
                </svg>
            </div>
            <div class="col-md-4 wow slideInLeft">
                <div class="section-sidebar">
                    <h2><span class="point">Portfolio</span></h2>
                    <div class="opacity-box">
                        <p>Selected company and freelance projects. Tap a project to view screenshots and details.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8 right-box">
        <div class="row">
            <div class="col-md-12">
                <div class="portfolio-sort wow slideInLeft">
                    <ul class="list-inline">
                        <li class="colored-link" data-mixitup-control data-filter="all">All projects</li>
                        <li class="colored-link" data-mixitup-control data-filter=".web-sites">Company Project</li>
                        <li class="colored-link" data-mixitup-control data-filter=".ui-ux-design">Freelance Project</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="portfolio">
                    <div class="row">
                        @forelse($portfolio as $port)
                        @php
                            $categoryLabel = match($port->category ?? '') {
                                'web-sites' => 'Company Project',
                                'ui-ux-design' => 'Freelance Project',
                                default => 'Project',
                            };
                            $dateDisplay = $port->date
                                ? Carbon\Carbon::parse($port->date)->format('F Y')
                                : '';
                            $cover = $port->image
                                ? asset('media/portfolio-images/' . rawurlencode($port->image))
                                : asset('media/portfolio-images/CARS.png');
                        @endphp
                        <div class="col-md-6 col-sm-6 col-xs-12 mix {{ $port->category ?? '' }} wow zoomIn portfolio-card-wrap">
                            <article class="portfolio-card"
                                     role="button"
                                     tabindex="0"
                                     data-id="{{ $port->id }}"
                                     data-title="{{ $port->title }}"
                                     data-cover="{{ $cover }}"
                                     aria-label="View {{ $port->title }}">
                                <div class="portfolio-card-media">
                                    <img src="{{ $cover }}" alt="{{ $port->title }} screenshot" loading="lazy">
                                    <div class="portfolio-card-overlay">
                                        <span class="portfolio-card-view">View project</span>
                                    </div>
                                </div>
                                <div class="portfolio-card-body">
                                    <h4 class="portfolio-card-title">{{ $port->title }}</h4>
                                    @if($dateDisplay)
                                        <p class="portfolio-card-meta">{{ $dateDisplay }}</p>
                                    @endif
                                    <div class="portfolio-card-footer">
                                        <span class="portfolio-card-badge">{{ $categoryLabel }}</span>
                                    </div>
                                </div>
                            </article>
                        </div>
                        @empty
                        <div class="col-md-12">
                            <p class="opacity-box" style="text-align:center; padding:2rem;">No projects to display yet.</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
            </div>
        </div>
    </div>
</section>

<section id="contact" class="section">
    <div class="container">
        <div class="row wave-bg">
            <div class="zigzag wow slideInLeft">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 105 20" xml:space="preserve">
                    <g>
                        <rect class="st0" width="105" height="20"/>
                        <g>
                            <polyline class="st1" points="2.5,5 16.8,15 31.1,5 45.3,15 59.6,5 73.9,15 88.2,5 102.5,15   "/>
                        </g>
                    </g>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 105 20" xml:space="preserve">
                    <g>
                        <rect class="st0" width="105" height="20"/>
                        <g>
                            <polyline class="st1" points="2.5,5 16.8,15 31.1,5 45.3,15 59.6,5 73.9,15 88.2,5 102.5,15   "/>
                        </g>
                    </g>
                </svg>
            </div>
            <div class="col-md-4 wow slideInLeft">
                <div class="section-sidebar">
                    <h2><span class="point">Contact</span></h2>
                    <div class="opacity-box">
                        <p>Are you working on something great? I would love to help make it
                            happen! Drop me a letter and start your project right now! Just do it.</p>
                    </div>
                </div>
            </div>
            <form action="#" class="wow slideInRight js-footer-form">
                <div class="form-wrapper">
                    <div class="col-md-3">
                        <div class="form-group">
                            <input class="form-field js-field-name" type="text" placeholder="Name" required>
                            <span class="form-validation"></span>
                            <span class="form-invalid-icon"><i class="mdi mdi-close" aria-hidden="true"></i></span>
                        </div>

                        <div class="form-group">
                            <input class="form-field js-field-email" type="email" placeholder="E-mail" required>
                            <span class="form-validation"></span>
                            <span class="form-invalid-icon"><i class="mdi mdi-close" aria-hidden="true"></i></span>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <textarea class="form-field js-field-message" placeholder="Message" required></textarea>
                            <span class="form-validation"></span>
                        </div>
                        <div class="submit-holder">
                            <input class="site-btn" type="submit" value="Send message">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<footer class="footer text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12 wow zoomIn">
                <div class="copyright">
                    <p>&copy; {{ date('Y') }} Suvindran. All rights reserved.</p>
                    <p class="footer-stack">Built with Laravel 10 · Supabase · Vercel</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Portfolio modal -->
<div class="modal fade" id="portfolio-modal" tabindex="-1" role="dialog" aria-labelledby="portfolio-modal-title">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">&times;</button>
                <div class="modal-title">
                    <h1 id="portfolio-modal-title"><span class="point modaltitle">Project</span></h1>
                </div>
                <div class="modal-description">
                    <p class="modaldesc"></p>
                </div>
                <div class="about-me-info">
                    <p>
                        <span class="span-title">Stack:</span>
                        <span class="stack"></span>
                    </p>
                    <p>
                        <span class="span-title">Date:</span>
                        <span class="projdate"></span>
                    </p>
                </div>
                <div class="modal-images" aria-live="polite">
                    <div class="modal-loading">Loading screenshots…</div>
                </div>
                <div class="about-btns">
                    <a href="#" class="site-btn project-link" target="_blank" rel="noopener" style="display:none;">Visit site</a>
                    <a href="#" class="site-btn gray-btn" data-dismiss="modal">Close</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Portfolio modal -->

<!-- Contact me modal -->
<div class="modal fade" id="contact-modal" tabindex="-1" role="dialog" aria-labelledby="portfolio-modal">
    <div class="modal-dialog modal-center" role="document">
        <div class="modal-content" >
            <div class="modal-body">
                <div class="modal-title">
                    <h1><span class="point">Let’s work together</span></h1>
                </div>
                <div class="modal-description">
                    <p>Are you working on something great? I would love to help make it happen!
                        Drop me a letter and start your project right now! Just do it.</p>
                </div>
                <div class="modal-form">
                    <form action="#" class="js-modal-form">
                        <div class="row form-wrapper">
                            <div class="col-lg-5 col-md-5">
                                <div class="form-group">
                                    <input class="form-field js-field-name" type="text" placeholder="Name" required>
                                    <span class="form-validation"></span>
                                    <span class="form-invalid-icon"><i class="mdi mdi-close" aria-hidden="true"></i></span>
                                </div>
                                <div class="form-group">
                                    <input class="form-field js-field-email" type="email" placeholder="E-mail" required>
                                    <span class="form-validation"></span>
                                    <span class="form-invalid-icon"><i class="mdi mdi-close" aria-hidden="true"></i></span>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7">
                                <div class="form-group">
                                    <textarea class="form-field js-field-message" placeholder="Message" required></textarea>
                                    <span class="form-validation"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="submit-holder">
                                    <input class="site-btn js-submit-contact" type="submit" value="Send message">
                                    <a href="#" class="site-btn gray-btn" data-dismiss="modal">Back to cv</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact me modal -->

<!-- Thank you modal -->
<div class="modal fade" id="thanks-modal" tabindex="-1" role="dialog" aria-labelledby="thanks-modal">
    <div class="modal-dialog modal-center" role="document">
        <div class="modal-content" >
            <div class="modal-body">
                <div class="modal-title">
                    <h1><span class="point">Your message has been sent</span></h1>
                </div>
                <div class="modal-description">
                    <p>Thank you for your interest in my work. I’ll contact you just in a few
                        days. Stay tuned and see you soon, friend!</p>
                </div>
                <a href="#" class="site-btn" data-dismiss="modal">Back to cv</a>
            </div>
        </div>
    </div>
</div>
<!-- Thank you modal -->

<!-- Error message modal -->
<div class="modal fade" id="error-modal" tabindex="-1" role="dialog" aria-labelledby="error-modal">
    <div class="modal-dialog modal-center" role="document">
        <div class="modal-content" >
            <div class="modal-body">
                <div class="modal-title">
                    <h1><span class="point">Ooops!</span></h1>
                </div>
                <div class="modal-description">
                    <p>Something go wrong!</p>
                </div>
                <a href="#" class="site-btn" data-dismiss="modal">Try again</a>
            </div>
        </div>
    </div>
</div>
<!-- Error message modal -->


<script src="js/jquery-2.2.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script src="js/jquery.placeholder.min.js"></script>

<!--Mix It Up-->
<script src="assets/mixitup-v3/dist/mixitup.min.js"></script>

<!--THEME-->
<script src="js/wow.min.js"></script>

<script src="js/theme.js"></script>


<script>
    $(document).ready(function() {
        var mediaBase = @json(rtrim(asset('media'), '/'));

        function mediaUrl(path) {
            if (!path) return '';
            return mediaBase + '/' + String(path).split('/').map(encodeURIComponent).join('/');
        }

        function isPdfUrl(src) {
            return /\.pdf($|\?)/i.test(String(src || ''));
        }

        function renderGallery(files, fallbackCover) {
            var $gallery = $('#portfolio-modal .modal-images');
            $gallery.empty();

            if (!files.length && fallbackCover) {
                files = [fallbackCover];
            }

            if (!files.length) {
                $gallery.html('<div class="modal-empty-shots">No screenshots available for this project yet.</div>');
                return;
            }

            files.forEach(function(src) {
                if (isPdfUrl(src)) {
                    var $wrap = $('<div class="modal-pdf-wrap"></div>');
                    $wrap.append(
                        $('<iframe>', {
                            class: 'modal-pdf-frame',
                            src: src + '#view=FitH',
                            title: 'Project UI PDF preview'
                        })
                    );
                    $gallery.append($wrap);
                    return;
                }

                $gallery.append(
                    $('<img>', {
                        src: src,
                        alt: 'Project screenshot',
                        loading: 'lazy'
                    })
                );
            });
        }

        function openPortfolioModal($card) {
            var id = $card.data('id');
            var cover = $card.data('cover');
            var title = $card.data('title') || 'Project';

            $('#portfolio-modal .modaltitle').text(title);
            $('#portfolio-modal .modaldesc').text('Loading project details…');
            $('#portfolio-modal .stack').text('—');
            $('#portfolio-modal .projdate').text('—');
            $('#portfolio-modal .project-link').hide().attr('href', '#');
            $('#portfolio-modal .modal-images').html('<div class="modal-loading">Loading preview…</div>');
            $('#portfolio-modal').modal('show');

            $.getJSON('{{ route('fetchdetails') }}', { id: id })
                .done(function(res) {
                    var header = res.header || {};
                    var details = res.details || [];

                    $('#portfolio-modal .modaltitle').text(header.title || title);
                    $('#portfolio-modal .modaldesc').text(header.description || 'No description available.');
                    $('#portfolio-modal .stack').text(header.stack || '—');

                    if (header.date) {
                        var d = new Date(header.date);
                        var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
                        $('#portfolio-modal .projdate').text(
                            isNaN(d.getTime()) ? header.date : (months[d.getMonth()] + ' ' + d.getFullYear())
                        );
                    } else {
                        $('#portfolio-modal .projdate').text('—');
                    }

                    if (header.website_url) {
                        $('#portfolio-modal .project-link').attr('href', header.website_url).show();
                    }

                    var files = details
                        .map(function(item) { return mediaUrl(item.image); })
                        .filter(Boolean);

                    // Prefer gallery media (images or PDF); fall back to cover image
                    renderGallery(files, cover);
                })
                .fail(function() {
                    $('#portfolio-modal .modaldesc').text('Could not load project details. Please try again.');
                    renderGallery([], cover);
                });
        }

        $(document).on('click', '.portfolio-card', function() {
            openPortfolioModal($(this));
        });

        $(document).on('keydown', '.portfolio-card', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                openPortfolioModal($(this));
            }
        });
    });
</script>

    <script>
        // Function to gather device information using platform.js
        function captureDeviceInfo() {
            var deviceInfo = platform.parse();

            var dataToSend = {
                visitor_id: 1, // Replace with actual visitor ID
                device_type: deviceInfo.product,
                browser: deviceInfo.name,
                browser_version: deviceInfo.version,
                os: deviceInfo.os.family,
                os_version: deviceInfo.os.version,
                ip_address: '{{ request()->ip() }}', // Laravel helper to get IP address
                hostname: '{{ gethostbyaddr(request()->ip()) }}' // Resolve hostname based on IP
            };

            // Send captured data to backend using fetch API with CSRF token included
            fetch('/api/store-device-info', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-Token': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Include CSRF token
                },
                body: JSON.stringify(dataToSend)
            })
            .then(response => response.json())
            .then(data => {
                //console.log('Device information stored successfully:', data);
            })
            .catch(error => {
                //console.error('Error storing device information:', error);
            });
        }

        // Capture device information automatically when the page loads
        window.onload = function() {
            captureDeviceInfo();
        };
    </script>
</body>
</html>
