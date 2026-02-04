<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>LinkUp - Connect Beyond the Surface</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;700;900&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#ea2a33",
                        "background-light": "#f8f6f6",
                        "background-dark": "#211111",
                    },
                    fontFamily: {
                        "display": ["Public Sans", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <style>
        body {
            font-family: "Public Sans", sans-serif;
        }

        .connection-pattern {
            background-image: radial-gradient(#ea2a33 0.5px, transparent 0.5px);
            background-size: 24px 24px;
            opacity: 0.05;
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark text-[#1b0e0e] dark:text-white transition-colors duration-200">
    <div class="relative min-h-screen flex flex-col">
        <!-- Navigation -->
        <header
            class="sticky top-0 z-50 bg-background-light/80 dark:bg-background-dark/80 backdrop-blur-md border-b border-[#f3e7e8] dark:border-white/10 px-6 lg:px-40 py-4">
            <div class="max-w-[1280px] mx-auto flex items-center justify-between">
                <div class="flex items-center gap-2 group cursor-pointer">
                    <div class="size-8 bg-primary rounded-lg flex items-center justify-center text-white">
                        <span class="material-symbols-outlined text-xl">hub</span>
                    </div>
                    <h2 class="text-[#1b0e0e] dark:text-white text-2xl font-black tracking-tight">LinkUp</h2>
                </div>
                <nav class="hidden md:flex items-center gap-10">
                    <a class="text-sm font-semibold hover:text-primary transition-colors" href="#">Features</a>
                    <a class="text-sm font-semibold hover:text-primary transition-colors" href="#">About</a>
                    <a class="text-sm font-semibold hover:text-primary transition-colors" href="#">Community</a>
                </nav>
                <div class="flex items-center gap-3">
                    <a href="/login"
                        class="hidden sm:flex min-w-[100px] h-11 items-center justify-center rounded-lg bg-[#f3e7e8] dark:bg-white/10 text-[#1b0e0e] dark:text-white text-sm font-bold hover:bg-[#e7d0d1] dark:hover:bg-white/20 transition-all">
                        Login
                    </a>
                    <a href="/#register"
                        class="flex min-w-[110px] h-11 items-center justify-center rounded-lg bg-primary text-white text-sm font-bold shadow-lg shadow-primary/20 hover:bg-[#d1242c] transition-all">
                        Sign Up
                    </a>
                </div>
            </div>
        </header>
        <main class="flex-grow">
            <!-- Hero Section -->
            <section class="relative px-6 lg:px-40 py-12 lg:py-24 overflow-hidden">
                <div class="absolute inset-0 connection-pattern -z-10"></div>
                <div class="max-w-[1280px] mx-auto grid lg:grid-cols-2 gap-16 items-center">
                    <div class="flex flex-col gap-8">
                        <div
                            class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/10 text-primary border border-primary/20 w-fit">
                            <span class="material-symbols-outlined text-sm">bolt</span>
                            <span class="text-xs font-bold uppercase tracking-wider">Next-Gen Networking</span>
                        </div>
                        <h1
                            class="text-5xl lg:text-7xl font-black leading-[1.1] tracking-tight text-[#1b0e0e] dark:text-white">
                            Connect <span class="text-primary">Beyond</span> the Surface.
                        </h1>
                        <p
                            class="text-lg lg:text-xl text-[#1b0e0e]/70 dark:text-white/70 leading-relaxed max-w-[540px]">
                            LinkUp is the modern social networking platform designed to help you find, meet, and
                            collaborate with like-minded professionals and creators in a meaningful way.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4">
                            <button
                                class="h-14 px-8 rounded-xl bg-primary text-white font-bold text-lg shadow-xl shadow-primary/30 hover:scale-[1.02] transition-transform active:scale-95">
                                Join the Community
                            </button>
                            <button
                                class="h-14 px-8 rounded-xl border-2 border-[#e7d0d1] dark:border-white/20 font-bold text-lg hover:bg-[#f3e7e8] dark:hover:bg-white/5 transition-colors">
                                Watch Demo
                            </button>
                        </div>
                        <div class="flex items-center gap-4 pt-4">
                            <div class="flex -space-x-3">
                                <img class="size-10 rounded-full border-2 border-background-light dark:border-background-dark object-cover"
                                    data-alt="Portrait of a female community member"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuCC9rH1AYgq6BdiUzKd-yc4Ibf2Sw63nLt44DwGKh5tx3sbUEEX3iD4O1wcZB-ueHQf3DPI1ocWdhfhYyPhQeERGpmRdtOUJgkyZygJ0hhlg14h5Sr_j-knaYQrnKBaPZFxO-epsjDnWlJ99NXC0OrzmcaulksKm0SVD8WY8pmqp4RMQ80UNsfonaZbdR8l36dmy5EoOvoblBXA6zeKieUFTTQeNCRP6dvDcBUQTX5GmOHlOSrp71Dc-S56gdtNt0glhgFdD-o_qA5i" />
                                <img class="size-10 rounded-full border-2 border-background-light dark:border-background-dark object-cover"
                                    data-alt="Portrait of a male creator profile"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBWAocCtUCbuKwgqMmLVY7NNj6H5D46gn8kzer09c-5SPJlt48onMEGcdB4ShyfYlm7LWR_aiKkVJmzfA3hy1iwubI18F2esez645vjurI_xMKs4-XQePiMUiXGlNOlh9vM-Tq_202Me4pFo_OCUqsucMdBcGm_qc5jSG3Z1zIW-A9o5nU91NiXPalb_3sjCyj_sxaUOimtJ4XQu6V48yVcg5PIt9Eg_u29VM01xhgX17R6gf_jOSQztZwZof2SR3xQDbYu9PNlt75X" />
                                <img class="size-10 rounded-full border-2 border-background-light dark:border-background-dark object-cover"
                                    data-alt="Portrait of a professional user"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuCGy65WwmZUuGiGeMmRqfsTz5J1WjD7Ct2kVibPWRAfn4R5NXnXwCDXzr6jfIFq_yollxSXqoBwJg1V-NF2YH80J_PomKC6n_zY4LUG2oaMcgz8vDOkX0-oRefKuJM1JbWbxwOw8JGkp-xuqIpSy8EDujnkigN-MwMybZuKCCaZ4yl8hql24MWGtGh7I7V91MfIEHFl03jTQL99zyKv0fnWLs0PxA5H_WK6adyVTOYQGxNas57TY6M3xw1yba9BbZ5_7Y261xkx6KDJ" />
                                <div
                                    class="size-10 rounded-full bg-primary flex items-center justify-center text-[10px] text-white font-bold border-2 border-background-light dark:border-background-dark">
                                    +2k</div>
                            </div>
                            <p class="text-sm font-medium text-[#1b0e0e]/60 dark:text-white/60">Trusted by 10,000+
                                creators</p>
                        </div>
                    </div>
                    <div class="relative">
                        <div class="absolute -inset-4 bg-primary/10 rounded-[2rem] blur-3xl -z-10"></div>
                        <div class="bg-white dark:bg-white/5 p-4 rounded-3xl shadow-2xl border border-white/20">
                            <div class="aspect-square bg-cover bg-center rounded-2xl"
                                data-alt="Group of diverse professionals collaborating together"
                                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuA-4m3XbtYqGhFx4qFVGMy09qJyo_zc6xLP1LmFvEBPEMZ2AS8niPyAYddwILGKtt4pMLhOwJPxK7lyXwp935uKZu9foKXS2E21amoUFWSe-Qag3SJ2gZsdDh6v-MJsORKmppvhTcKsQS0y0i_eKkFhVH8dR5XJuO6sdjjrWKstg9OBDvyWOHrJMWNsf48p57ah-GDwvVRAo8LMfvR5FG9O8_w3FQvR2KguMtPzRT_Dsvu9jCf4oLo5LCd5KT-rC3IH5Pq0XtUP-Q81");'>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Stats Bar -->
            <section class="px-6 lg:px-40 py-12">
                <div
                    class="max-w-[1280px] mx-auto bg-white dark:bg-white/5 rounded-2xl border border-[#e7d0d1] dark:border-white/10 p-1">
                    <div
                        class="grid grid-cols-1 md:grid-cols-3 divide-y md:divide-y-0 md:divide-x divide-[#e7d0d1] dark:divide-white/10">
                        <div class="flex flex-col items-center justify-center py-8 gap-1">
                            <span class="text-4xl font-black text-primary">10k+</span>
                            <span
                                class="text-sm font-semibold uppercase tracking-widest text-[#1b0e0e]/50 dark:text-white/50">Active
                                Users</span>
                        </div>
                        <div class="flex flex-col items-center justify-center py-8 gap-1">
                            <span class="text-4xl font-black text-primary">500+</span>
                            <span
                                class="text-sm font-semibold uppercase tracking-widest text-[#1b0e0e]/50 dark:text-white/50">Communities</span>
                        </div>
                        <div class="flex flex-col items-center justify-center py-8 gap-1">
                            <span class="text-4xl font-black text-primary">1M+</span>
                            <span
                                class="text-sm font-semibold uppercase tracking-widest text-[#1b0e0e]/50 dark:text-white/50">Connections</span>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Feature Section -->
            <section class="px-6 lg:px-40 py-20 bg-[#fef0f1] dark:bg-primary/5">
                <div class="max-w-[1280px] mx-auto">
                    <div class="flex flex-col gap-4 mb-16 text-center lg:text-left">
                        <h2 class="text-primary font-bold tracking-widest uppercase text-sm">Core Features</h2>
                        <h3 class="text-4xl lg:text-5xl font-black tracking-tight max-w-[700px]">Designed for meaningful
                            connections</h3>
                        <p class="text-lg text-[#1b0e0e]/70 dark:text-white/70 max-w-[600px]">Explore the tools that
                            make LinkUp the preferred choice for networking and professional growth.</p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div
                            class="bg-white dark:bg-background-dark p-8 rounded-2xl border border-[#e7d0d1] dark:border-white/10 hover:shadow-xl transition-all group">
                            <div
                                class="size-14 bg-primary/10 rounded-xl flex items-center justify-center text-primary mb-6 group-hover:bg-primary group-hover:text-white transition-colors">
                                <span class="material-symbols-outlined text-3xl">person_search</span>
                            </div>
                            <h4 class="text-xl font-bold mb-3">Profile Discovery</h4>
                            <p class="text-[#994d51] dark:text-white/60 leading-relaxed">Find people based on shared
                                interests, specific niche skills, and past experiences effortlessly.</p>
                        </div>
                        <div
                            class="bg-white dark:bg-background-dark p-8 rounded-2xl border border-[#e7d0d1] dark:border-white/10 hover:shadow-xl transition-all group">
                            <div
                                class="size-14 bg-primary/10 rounded-xl flex items-center justify-center text-primary mb-6 group-hover:bg-primary group-hover:text-white transition-colors">
                                <span class="material-symbols-outlined text-3xl">manage_search</span>
                            </div>
                            <h4 class="text-xl font-bold mb-3">Smart Search</h4>
                            <p class="text-[#994d51] dark:text-white/60 leading-relaxed">Powerful AI-driven filters to
                                connect you with the right network and opportunities quickly.</p>
                        </div>
                        <div
                            class="bg-white dark:bg-background-dark p-8 rounded-2xl border border-[#e7d0d1] dark:border-white/10 hover:shadow-xl transition-all group">
                            <div
                                class="size-14 bg-primary/10 rounded-xl flex items-center justify-center text-primary mb-6 group-hover:bg-primary group-hover:text-white transition-colors">
                                <span class="material-symbols-outlined text-3xl">forum</span>
                            </div>
                            <h4 class="text-xl font-bold mb-3">Real-time Interaction</h4>
                            <p class="text-[#994d51] dark:text-white/60 leading-relaxed">Instant messaging and dynamic
                                community hubs for seamless collaboration and networking.</p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- CTA Section -->
            <section class="px-6 lg:px-40 py-24">
                <div
                    class="max-w-[1280px] mx-auto bg-primary rounded-[2.5rem] p-12 lg:p-24 relative overflow-hidden text-center text-white">
                    <!-- Abstract Background circles -->
                    <div class="absolute top-0 right-0 size-64 bg-white/10 rounded-full -mr-20 -mt-20 blur-3xl"></div>
                    <div class="absolute bottom-0 left-0 size-64 bg-black/10 rounded-full -ml-20 -mb-20 blur-3xl"></div>
                    <div class="relative z-10 flex flex-col items-center gap-8">
                        <h2 class="text-4xl lg:text-6xl font-black tracking-tight leading-tight max-w-[800px]">Ready to
                            expand your professional network?</h2>
                        <p class="text-lg lg:text-xl text-white/80 max-w-[600px]">Join thousands of professionals and
                            creators today. Set up your profile in less than 2 minutes.</p>
                        <div class="flex flex-col sm:flex-row gap-4 w-full justify-center">
                            <button
                                class="h-16 px-10 bg-white text-primary rounded-xl font-bold text-lg hover:bg-[#f8f6f6] transition-colors shadow-2xl">
                                Get Started Now
                            </button>
                            <button
                                class="h-16 px-10 border-2 border-white/30 text-white rounded-xl font-bold text-lg hover:bg-white/10 transition-colors">
                                View Pricing
                            </button>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!-- Footer -->
        <footer
            class="bg-white dark:bg-background-dark border-t border-[#f3e7e8] dark:border-white/10 px-6 lg:px-40 py-16">
            <div class="max-w-[1280px] mx-auto grid grid-cols-1 md:grid-cols-4 gap-12">
                <div class="col-span-1 md:col-span-1 flex flex-col gap-6">
                    <div class="flex items-center gap-2">
                        <div class="size-8 bg-primary rounded-lg flex items-center justify-center text-white">
                            <span class="material-symbols-outlined text-xl">hub</span>
                        </div>
                        <h2 class="text-2xl font-black tracking-tight">LinkUp</h2>
                    </div>
                    <p class="text-sm text-[#1b0e0e]/60 dark:text-white/60 leading-relaxed">
                        The modern social networking platform built for the next generation of professional
                        relationships and collaboration.
                    </p>
                    <div class="flex gap-4">
                        <a class="size-10 rounded-full bg-[#f3e7e8] dark:bg-white/5 flex items-center justify-center hover:bg-primary hover:text-white transition-all"
                            href="#">
                            <span class="material-symbols-outlined text-xl">share</span>
                        </a>
                        <a class="size-10 rounded-full bg-[#f3e7e8] dark:bg-white/5 flex items-center justify-center hover:bg-primary hover:text-white transition-all"
                            href="#">
                            <span class="material-symbols-outlined text-xl">public</span>
                        </a>
                    </div>
                </div>
                <div class="flex flex-col gap-6">
                    <h4 class="font-bold uppercase tracking-widest text-xs">Platform</h4>
                    <ul class="flex flex-col gap-3 text-sm font-medium text-[#1b0e0e]/70 dark:text-white/70">
                        <li><a class="hover:text-primary transition-colors" href="#">Find Talents</a></li>
                        <li><a class="hover:text-primary transition-colors" href="#">Post Jobs</a></li>
                        <li><a class="hover:text-primary transition-colors" href="#">Communities</a></li>
                        <li><a class="hover:text-primary transition-colors" href="#">Events</a></li>
                    </ul>
                </div>
                <div class="flex flex-col gap-6">
                    <h4 class="font-bold uppercase tracking-widest text-xs">Company</h4>
                    <ul class="flex flex-col gap-3 text-sm font-medium text-[#1b0e0e]/70 dark:text-white/70">
                        <li><a class="hover:text-primary transition-colors" href="#">About Us</a></li>
                        <li><a class="hover:text-primary transition-colors" href="#">Careers</a></li>
                        <li><a class="hover:text-primary transition-colors" href="#">Contact</a></li>
                        <li><a class="hover:text-primary transition-colors" href="#">Newsroom</a></li>
                    </ul>
                </div>
                <div class="flex flex-col gap-6">
                    <h4 class="font-bold uppercase tracking-widest text-xs">Legal</h4>
                    <ul class="flex flex-col gap-3 text-sm font-medium text-[#1b0e0e]/70 dark:text-white/70">
                        <li><a class="hover:text-primary transition-colors" href="#">Privacy Policy</a></li>
                        <li><a class="hover:text-primary transition-colors" href="#">Terms of Service</a></li>
                        <li><a class="hover:text-primary transition-colors" href="#">Cookie Policy</a></li>
                    </ul>
                </div>
            </div>
            <div
                class="max-w-[1280px] mx-auto mt-16 pt-8 border-t border-[#f3e7e8] dark:border-white/10 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-xs text-[#1b0e0e]/50 dark:text-white/50">© 2024 LinkUp Inc. All rights reserved.</p>
                <div class="flex items-center gap-4">
                    <span class="material-symbols-outlined text-sm">language</span>
                    <span class="text-xs font-bold">English (US)</span>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>