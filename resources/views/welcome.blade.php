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

/* Portfolio cards - text-only with hover tooltip */
.portfolio-card {
    background: #fff;
    border: 1px solid rgba(0,0,0,.08);
    border-radius: 10px;
    padding: 2rem 2.25rem;
    margin-bottom: 1.5rem;
    min-height: 140px;
    transition: box-shadow .2s, border-color .2s;
    cursor: default;
}
.portfolio-card:hover {
    box-shadow: 0 6px 20px rgba(0,0,0,.1);
    border-color: rgba(0,0,0,.12);
}
.portfolio-card-title {
    font-size: 1.35rem;
    font-weight: 600;
    margin: 0 0 .5rem 0;
    color: inherit;
    line-height: 1.3;
}
.portfolio-card-meta {
    font-size: 1.1rem;
    opacity: .8;
    margin-bottom: .5rem;
}
.portfolio-card-badge {
    display: inline-block;
    font-size: .95rem;
    padding: .35rem .75rem;
    background: rgba(0,0,0,.06);
    border-radius: 6px;
    margin-top: .5rem;
}
.popover { max-width: 380px; }
.popover .popover-title { font-size: 1.15rem; margin-bottom: .5rem; }
.popover .popover-content p { margin: 0 0 .5rem 0; font-size: 1rem; line-height: 1.55; }
.popover .popover-content p:last-child { margin-bottom: 0; }
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
                <div class="row">
                    <div class="col-md-6 wow zoomIn">
                        <div class="advantages-box">
                            <h4>Web Development</h4>
                            <div class="opacity-box">
                                <p>PHP, JavaScript, Laravel, MySQL, Composer, Blade, Eloquent ORM, Artisan CLI, RESTful APIs, Git, MVC, OOP, Middleware, Laravel Mix, Queues &amp; Jobs, TypeScript, Python, API integration.</p>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-6 wow zoomIn">
                        <hr class="mobile-hr">
                        <div class="advantages-box">
                            <h4>UI\UX Design</h4>
                            <div class="opacity-box">
                                <p>Photoshop, Figma, Canva, Proto.io, Photopea, JustInMind.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 wow zoomIn">
                        <hr>
                        <div class="advantages-box">
                            <h4>Frontend Development</h4>
                            <div class="opacity-box">
                                <p>HTML, CSS, JavaScript, Bootstrap, jQuery, responsive design, cross-browser compatibility, AJAX, CSS Grid, Flexbox.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 wow zoomIn">
                        <hr>
                        <div class="advantages-box">
                            <h4>Reporting, Charts &amp; Plugins</h4>
                            <div class="opacity-box">
                                <p>KoolReport, Tableau, chartjs, Spatie (Roles & Permission), Spatie Simple Excel, Mpdf, DOMPDF, Laravel Telescope.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 wow zoomIn">
                        <hr>
                        <div class="advantages-box">
                            <h4>Database</h4>
                            <div class="opacity-box">
                                <p>MySQL, Firebase, Microsoft SQL Server.</p>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6 wow zoomIn">
                        <hr>
                        <div class="advantages-box">
                            <h4>Mobile Development</h4>
                            <div class="opacity-box">
                                <p>Flutter Flow, React Native, Expo, Android Studio.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 wow zoomIn">
                        <hr>
                        <div class="advantages-box">
                            <h4>Others</h4>
                            <div class="opacity-box">
                                <p>CodeIgniter, Visual Basic, GitHub, Plesk, Hostinger, YeahHost, cPanel, NetBeans, Eclipse, ToyyibPay.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 wow zoomIn">
                        <hr>
                        <div class="advantages-box">
                            <h4>AI Development Tools</h4>
                            <div class="opacity-box">
                                <p>Cursor, GitHub Copilot.</p>
                            </div>
                        </div>
                    </div>

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
                        <p>Selected projects from company work, freelance, and academic projects. Hover over a project for details.</p>
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
                        <li class="colored-link" data-mixitup-control data-filter=".frontend">Final Year Project</li>
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
                                'frontend' => 'Final Year Project',
                                default => 'Project',
                            };
                            $tooltipDesc = e($port->description ?? '');
                            $tooltipStack = e($port->stack ?? '');
                            $dateDisplay = $port->date_display ?? Carbon\Carbon::parse($port->date)->format('F Y');
                        @endphp
                        <div class="col-md-6 col-sm-6 mix {{ $port->category ?? '' }} wow zoomIn portfolio-card-wrap">
                            <div class="portfolio-card portfolio-tooltip" 
                                 data-id="{{ $port->id }}"
                                 data-toggle="popover" 
                                 data-trigger="hover" 
                                 data-placement="top"
                                 data-html="true"
                                 data-title="{{ $port->title }}"
                                 data-description="{{ $tooltipDesc }}"
                                 data-stack="{{ $tooltipStack }}"
                                 data-date="{{ $dateDisplay }}">
                                <h4 class="portfolio-card-title">{{ $port->title }}</h4>
                                <p class="portfolio-card-meta">{{ $dateDisplay }}</p>
                                <span class="portfolio-card-badge">{{ $categoryLabel }}</span>
                            </div>
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
                    <p>Copyright 2026 Suvindran. Build with Laravel 10.</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Portfolio modal -->
<div class="modal fade" id="portfolio-modal" tabindex="-1" role="dialog" aria-labelledby="portfolio-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content" >
            <div class="modal-body" data-name="patty">
                <div class="modal-title">
                    <h1><span class="point modaltitle"></span></h1>
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
                <div class="about-btns">
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
        $('.portfolio-tooltip').popover({
            trigger: 'hover',
            html: true,
            placement: 'top',
            container: 'body',
            title: function() { return $(this).data('title'); },
            content: function() {
                var desc = $(this).data('description') || '';
                var stack = $(this).data('stack') || '';
                var date = $(this).data('date') || '';
                var html = '';
                if (desc) html += '<p><strong>Description</strong><br>' + desc + '</p>';
                if (stack) html += '<p><strong>Stack</strong> ' + stack + '</p>';
                if (date) html += '<p><strong>Date</strong> ' + date + '</p>';
                return html || '<p>No details available.</p>';
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
