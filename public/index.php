<?php
// Gracefully catch any connection errors or configuration issues
$db_status = "Not connected";
$db_success = false;
$db_info = [];

try {
    require_once __DIR__ . '/includes/connect_db.php';
    if (isset($pdo) && $pdo instanceof PDO) {
        $db_success = true;
        $db_status = "Successfully connected to the database.";
        $db_info = [
            'Host' => getenv('DB_HOST') ?: 'localhost',
            'Database' => getenv('DB_NAME') ?: 'N/A',
            'User' => getenv('DB_USER') ?: 'N/A'
        ];
    } else {
        $db_status = "Database interface (PDO) not initialized.";
    }
} catch (Throwable $e) {
    $db_status = "Connection Failed: " . $e->getMessage();
    $db_info = [
        'Host' => getenv('DB_HOST') ?: 'localhost',
        'Database' => getenv('DB_NAME') ?: 'N/A'
    ];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Integration Diagnostics</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Compiled Tailwind CSS -->
    <link rel="stylesheet" href="assets/css/output.css">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: radial-gradient(circle at top left, #111827, #030712);
        }

        .glass {
            background: rgba(17, 24, 39, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
    </style>
</head>

<body class="min-h-screen text-slate-100 flex flex-col justify-between overflow-x-hidden relative">

    <!-- Background Design Accents -->
    <div class="absolute top-0 left-1/4 w-96 h-96 bg-purple-600/10 rounded-full blur-3xl -z-10 pointer-events-none">
    </div>
    <div class="absolute top-20 right-1/4 w-96 h-96 bg-indigo-600/10 rounded-full blur-3xl -z-10 pointer-events-none">
    </div>

    <!-- Main Container -->
    <main class="max-w-4xl w-full mx-auto px-6 py-12 flex-grow flex flex-col justify-center">

        <!-- Header -->
        <div class="text-center mb-10">
            <span
                class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-indigo-500/10 text-indigo-400 border border-indigo-500/25 mb-4 animate-pulse">
                Diagnostics Suite
            </span>
            <h1
                class="text-4xl md:text-5xl font-extrabold tracking-tight bg-gradient-to-r from-white via-slate-200 to-indigo-400 bg-clip-text text-transparent">
                Valo xXx Test Center
            </h1>
            <p class="mt-2 text-slate-400 text-sm md:text-base">
                Verifying backend database connections, stylesheet rendering, and javascript libraries.
            </p>
        </div>

        <!-- Diagnostic Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

            <!-- Tailwind CSS Diagnostic Card -->
            <div
                class="glass rounded-2xl p-6 transition-all duration-300 hover:border-indigo-500/40 hover:scale-[1.02] flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-2.5 bg-sky-500/10 text-sky-400 rounded-xl border border-sky-500/25">
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 6.00001C9.6 6.00001 8.1 7.20001 7.5 9.60001C8.4 8.40001 9.45 7.95001 10.65 8.25001C11.3344 8.42111 11.822 8.91696 12.3615 9.46604C13.2405 10.3606 14.285 11.425 16.5 11.425C18.9 11.425 20.4 10.225 21 7.82501C20.1 9.02501 19.05 9.47501 17.85 9.17501C17.1656 9.00391 16.678 8.50806 16.1385 7.95897C15.2595 7.06437 14.215 6.00001 12 6.00001ZM7.5 11.425C5.1 11.425 3.6 12.625 3 15.025C3.9 13.825 4.95 13.375 6.15 13.675C6.83438 13.8461 7.32195 14.342 7.86146 14.891C8.7405 15.7856 9.78497 16.85 12 16.85C14.4 16.85 15.9 15.65 16.5 13.25C15.6 14.45 14.55 14.9 13.35 14.6C12.6656 14.4289 12.178 13.933 11.6385 13.384C10.7595 12.4894 9.71503 11.425 7.5 11.425Z"
                                    fill="currentColor" />
                            </svg>
                        </div>
                        <span
                            class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                            Loaded
                        </span>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-2">Tailwind CSS v4</h3>
                    <p class="text-xs text-slate-400 leading-relaxed">
                        Tailwind CSS engine is rendering utility classes dynamically from the generated stylesheet.
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-slate-800">
                    <div class="flex items-center gap-2">
                        <div class="w-3 h-3 rounded-full bg-cyan-400 shadow-[0_0_10px_rgba(34,211,238,0.5)]"></div>
                        <span class="text-xs text-cyan-400 font-mono font-medium">Styles Active</span>
                    </div>
                </div>
            </div>

            <!-- Database Diagnostic Card -->
            <div
                class="glass rounded-2xl p-6 transition-all duration-300 hover:border-indigo-500/40 hover:scale-[1.02] flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="p-2.5 <?php echo $db_success ? 'bg-emerald-500/10 text-emerald-400 border-emerald-500/25' : 'bg-rose-500/10 text-rose-400 border-rose-500/25'; ?> rounded-xl border">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4">
                                </path>
                            </svg>
                        </div>
                        <span
                            class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-medium <?php echo $db_success ? 'bg-emerald-500/10 text-emerald-400 border-emerald-500/20' : 'bg-rose-500/10 text-rose-400 border-rose-500/20'; ?>">
                            <?php echo $db_success ? 'Success' : 'Failed'; ?>
                        </span>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-2">MySQL Connection</h3>
                    <p class="text-xs text-slate-400 leading-relaxed max-h-16 overflow-y-auto font-mono">
                        <?php echo htmlspecialchars($db_status); ?>
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-slate-800">
                    <div class="text-xs font-mono text-slate-500 space-y-1">
                        <div>Host: <span class="text-slate-300">
                                <?php echo htmlspecialchars($db_info['Host'] ?? 'unknown'); ?>
                            </span></div>

                        <div>Database: <span class="text-slate-300">
                                <?php echo htmlspecialchars($db_info['Database'] ?? 'unknown'); ?>
                            </span></div>
                    </div>
                </div>
            </div>

            <!-- jQuery Diagnostic Card -->
            <div
                class="glass rounded-2xl p-6 transition-all duration-300 hover:border-indigo-500/40 hover:scale-[1.02] flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-2.5 bg-blue-500/10 text-blue-400 rounded-xl border border-blue-500/25">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                            </svg>
                        </div>
                        <span id="jq-badge"
                            class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-500/10 text-amber-400 border border-amber-500/20 animate-pulse">
                            Pending
                        </span>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-2">jQuery 4.0</h3>
                    <p class="text-xs text-slate-400 leading-relaxed">
                        Testing client-side Javascript library integration. Click below to test dynamic event bindings.
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-slate-800">
                    <button id="jq-btn"
                        class="w-full py-2 px-4 rounded-xl text-xs font-semibold bg-indigo-600 hover:bg-indigo-500 active:scale-[0.98] transition-all cursor-pointer text-center text-white shadow-lg shadow-indigo-600/20">
                        Trigger JS Test
                    </button>
                </div>
            </div>

        </div>

        <!-- Diagnostics Output Console -->
        <div class="glass rounded-2xl p-6 border border-slate-800">
            <h4 class="text-sm font-semibold text-slate-300 mb-3 flex items-center gap-2">
                <span class="w-2.5 h-2.5 rounded-full bg-indigo-400 animate-ping"></span>
                Diagnostics Console
            </h4>
            <div id="console-logs"
                class="font-mono text-xs text-slate-400 bg-slate-950/50 rounded-xl p-4 border border-slate-900 space-y-2 max-h-48 overflow-y-auto">
                <div class="text-indigo-400">[info] Diagnostic environment initialized.</div>
                <div class="<?php echo $db_success ? 'text-emerald-400' : 'text-rose-400'; ?>">[database]
                    <?php echo htmlspecialchars($db_status); ?>
                </div>
            </div>
        </div>

    </main>

    <!-- Footer -->
    <footer class="border-t border-slate-900 py-6 text-center text-xs text-slate-600">
        &copy;
        <?php echo date('Y'); ?> Valo xXx Diagnostic Center. All systems operational.
    </footer>

    <!-- Script Import (jQuery 4.0.0) -->
    <script src="assets/js/jquery-4.0.0.min.js"></script>
    <script>
        $(document).ready(function () {
            const jqVersion = $().jquery;
            const logBox = $('#console-logs');

            // Log successful initialization of jQuery
            logBox.append(`<div class="text-blue-400">[jquery] jQuery v${jqVersion} loaded successfully.</div>`);

            // Update badge status
            $('#jq-badge')
                .removeClass('bg-amber-500/10 text-amber-400 border-amber-500/20 animate-pulse')
                .addClass('bg-emerald-500/10 text-emerald-400 border-emerald-500/20')
                .text('Connected');

            // Button Click Event Test
            let clicks = 0;
            $('#jq-btn').on('click', function () {
                clicks++;
                const stamp = new Date().toLocaleTimeString();
                logBox.append(`<div class="text-purple-400">[event] Click event registered (${clicks}x) at ${stamp}</div>`);
                logBox.scrollTop(logBox[0].scrollHeight);
            });
        });
    </script>
</body>

</html>