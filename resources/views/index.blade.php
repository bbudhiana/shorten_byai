<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BanaURLShorten</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: { 50: '#f0f9ff', 100: '#e0f2fe', 200: '#bae6fd', 300: '#7dd3fc', 400: '#38bdf8', 500: '#0ea5e9', 600: '#0284c7', 700: '#0369a1' },
                        dark: { 800: '#1e293b', 850: '#172033', 900: '#0f172a', 950: '#020617' },
                    }
                }
            }
        }
    </script>
    <style>
        @keyframes fade-in-up { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        .animate-fade-in-up { animation: fade-in-up 0.5s ease-out both; }
        @keyframes fade-in { from { opacity: 0; } to { opacity: 1; } }
        .animate-fade-in { animation: fade-in 0.4s ease-out both; }
        @keyframes pulse-green { 0%, 100% { opacity: 1; } 50% { opacity: 0.6; } }
        .animate-pulse-green { animation: pulse-green 0.4s ease-in-out; }
        @keyframes slide-down { from { opacity: 0; transform: translateY(-8px); } to { opacity: 1; transform: translateY(0); } }
        .animate-slide-down { animation: slide-down 0.3s ease-out both; }
        @keyframes gradient-shift { 0% { background-position: 0% 50%; } 50% { background-position: 100% 50%; } 100% { background-position: 0% 50%; } }
        .animate-gradient { background-size: 200% 200%; animation: gradient-shift 8s ease infinite; }
        @keyframes float { 0%, 100% { transform: translateY(0) rotate(0deg); } 33% { transform: translateY(-20px) rotate(1deg); } 66% { transform: translateY(10px) rotate(-1deg); } }
        @keyframes loading-dot { 0%, 80%, 100% { opacity: 0; transform: scale(0.6); } 40% { opacity: 1; transform: scale(1); } }
        .loading-dot { animation: loading-dot 1.4s infinite ease-in-out both; }
        .loading-dot:nth-child(1) { animation-delay: -0.32s; }
        .loading-dot:nth-child(2) { animation-delay: -0.16s; }
        .loading-dot:nth-child(3) { animation-delay: 0s; }

        .delay-1 { animation-delay: 0.1s; }
        .delay-2 { animation-delay: 0.2s; }
        .delay-3 { animation-delay: 0.3s; }
        .delay-4 { animation-delay: 0.4s; }

        @keyframes shimmer { 0% { background-position: -200% 0; } 100% { background-position: 200% 0; } }
        .shimmer {
            background: linear-gradient(90deg, transparent 0%, rgba(56, 189, 248, 0.08) 50%, transparent 100%);
            background-size: 200% 100%;
            animation: shimmer 3s infinite;
        }

        @keyframes particle-float { 0%, 100% { transform: translateY(0) translateX(0) scale(1); opacity: 0.3; } 25% { transform: translateY(-30px) translateX(15px) scale(1.1); opacity: 0.5; } 50% { transform: translateY(-10px) translateX(-10px) scale(0.9); opacity: 0.2; } 75% { transform: translateY(-40px) translateX(5px) scale(1.05); opacity: 0.4; } }
        .particle { position: fixed; border-radius: 50%; pointer-events: none; animation: particle-float 12s infinite ease-in-out; }

        @keyframes glow-pulse { 0%, 100% { box-shadow: 0 0 20px rgba(56, 189, 248, 0.1); } 50% { box-shadow: 0 0 40px rgba(56, 189, 248, 0.2); } }
        .glow-card { animation: glow-pulse 4s infinite ease-in-out; }

        @keyframes count-up { from { opacity: 0; transform: scale(0.5); } to { opacity: 1; transform: scale(1); } }
        .animate-count { animation: count-up 0.3s ease-out; }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-dark-950 via-dark-900 to-dark-850 text-gray-100 antialiased overflow-x-hidden">
    <div class="fixed inset-0 overflow-hidden pointer-events-none z-0">
        <div class="particle" style="width:300px;height:300px;background:radial-gradient(circle,rgba(56,189,248,0.06),transparent);top:-5%;left:-5%;animation-delay:0s;"></div>
        <div class="particle" style="width:250px;height:250px;background:radial-gradient(circle,rgba(14,165,233,0.05),transparent);top:30%;right:-3%;animation-delay:-3s;"></div>
        <div class="particle" style="width:200px;height:200px;background:radial-gradient(circle,rgba(56,189,248,0.04),transparent);bottom:10%;left:10%;animation-delay:-6s;"></div>
        <div class="particle" style="width:150px;height:150px;background:radial-gradient(circle,rgba(99,102,241,0.04),transparent);top:60%;left:60%;animation-delay:-4s;"></div>
        <div class="particle" style="width:180px;height:180px;background:radial-gradient(circle,rgba(14,165,233,0.05),transparent);bottom:30%;right:15%;animation-delay:-8s;"></div>
    </div>

    <nav class="sticky top-0 z-50 border-b border-gray-700/30 bg-dark-950/70 backdrop-blur-xl">
        <div class="mx-auto max-w-4xl flex items-center justify-between px-4 py-3 sm:px-6 lg:px-8">
            <a href="#" class="text-lg font-bold bg-gradient-to-r from-primary-400 to-primary-600 bg-clip-text text-transparent tracking-tight">
                BanaURLShorten
            </a>
            <a href="#" class="text-sm text-gray-400 hover:text-primary-400 transition-colors duration-200 font-medium">
                Home
            </a>
        </div>
    </nav>

    <div class="relative z-10 mx-auto max-w-4xl px-4 py-10 sm:px-6 lg:px-8">

        <div class="mb-10 text-center animate-fade-in-up delay-1">
            <h1 class="text-5xl sm:text-6xl font-bold tracking-tight bg-gradient-to-r from-primary-300 via-primary-400 to-primary-600 bg-clip-text text-transparent">
                BanaURLShorten
            </h1>
            <p class="mt-4 text-gray-400 text-sm max-w-md mx-auto">Paste a long URL and get a clean short link instantly.</p>
        </div>

        <div class="mx-auto max-w-2xl mb-12 animate-fade-in-up delay-2">
            <form id="shortenForm" class="flex flex-col sm:flex-row gap-3">
                @csrf
                <div class="flex-1 relative group">
                    <input
                        type="url"
                        name="original_url"
                        id="urlInput"
                        required
                        placeholder="https://example.com/your-very-long-url"
                        class="w-full rounded-xl border border-gray-700/50 bg-dark-800/80 backdrop-blur px-5 py-3.5 text-gray-100 placeholder-gray-500 outline-none transition-all duration-300 focus:border-primary-500 focus:ring-2 focus:ring-primary-500/20 focus:shadow-lg focus:shadow-primary-500/10 group-hover:border-gray-600/50"
                    >
                </div>
                <button
                    type="submit"
                    id="shortenBtn"
                    class="rounded-xl bg-gradient-to-r from-primary-600 to-primary-500 px-7 py-3.5 font-semibold text-white shadow-lg shadow-primary-600/25 transition-all duration-300 hover:from-primary-500 hover:to-primary-400 hover:shadow-primary-500/30 hover:scale-[1.02] active:scale-[0.98] disabled:opacity-50 disabled:cursor-not-allowed whitespace-nowrap shimmer"
                >
                    <span id="btnText">Shorten</span>
                    <span id="btnLoader" class="hidden inline-flex items-center gap-1">
                        <span class="loading-dot w-1.5 h-1.5 bg-white rounded-full inline-block"></span>
                        <span class="loading-dot w-1.5 h-1.5 bg-white rounded-full inline-block"></span>
                        <span class="loading-dot w-1.5 h-1.5 bg-white rounded-full inline-block"></span>
                    </span>
                </button>
            </form>
            <p id="errorMsg" class="mt-3 text-sm text-red-400 hidden animate-slide-down"></p>
        </div>

        <div id="resultBox" class="mx-auto max-w-2xl mb-12 hidden animate-fade-in-up">
            <div class="rounded-2xl border border-primary-500/30 bg-dark-800/40 backdrop-blur-xl p-5 glow-card">
                <div class="flex items-center justify-between gap-4">
                    <div class="min-w-0 flex-1">
                        <p class="text-xs text-gray-400 mb-1 font-medium tracking-wide uppercase">Your shortened URL</p>
                        <p id="shortUrlDisplay" class="text-lg font-semibold text-primary-400 truncate"></p>
                    </div>
                    <button
                        id="copyBtn"
                        onclick="copyShortUrl()"
                        class="shrink-0 rounded-lg bg-primary-500/10 border border-primary-500/30 px-4 py-2.5 text-sm font-medium text-primary-400 transition-all duration-200 hover:bg-primary-500/20 hover:scale-105 active:scale-95"
                    >
                        <span id="copyText">Copy</span>
                    </button>
                </div>
                <p class="mt-2 text-xs text-gray-500 truncate" id="originalUrlDisplay"></p>
            </div>
        </div>

        <div class="mx-auto max-w-4xl animate-fade-in-up delay-3">
            <div class="flex items-center justify-between mb-5">
                <h2 class="text-lg font-semibold text-gray-200">Recent Links</h2>
                <span id="linkCount" class="text-xs text-gray-500 bg-dark-800/60 px-3 py-1 rounded-full border border-gray-700/40">{{ $urls->count() }} links</span>
            </div>

            <div class="overflow-hidden rounded-2xl border border-gray-700/40 bg-dark-800/30 backdrop-blur">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b border-gray-700/40 text-gray-400 text-left">
                                <th class="px-5 py-3.5 font-medium">Original URL</th>
                                <th class="px-5 py-3.5 font-medium">Short Link</th>
                                <th class="px-5 py-3.5 font-medium text-center">Clicks</th>
                                <th class="px-5 py-3.5 font-medium">Created</th>
                                <th class="px-5 py-3.5 font-medium text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="urlTableBody" class="divide-y divide-gray-700/30">
                            @forelse($urls as $url)
                                <tr class="transition-all duration-200 hover:bg-white/[0.03] hover:scale-[1.002] group">
                                    <td class="px-5 py-3.5">
                                        <span class="text-gray-300 block max-w-[280px] truncate" title="{{ $url->original_url }}">{{ $url->original_url }}</span>
                                    </td>
                                    <td class="px-5 py-3.5">
                                        <a href="{{ $url->short_url }}" target="_blank" class="text-primary-400 hover:text-primary-300 font-medium transition-colors duration-200">
                                            {{ $url->short_code }}
                                        </a>
                                    </td>
                                    <td class="px-5 py-3.5 text-center">
                                        <span id="clickCount-{{ $url->id }}" class="inline-flex items-center justify-center min-w-[2rem] rounded-full bg-gray-700/40 px-2.5 py-0.5 text-xs font-semibold text-gray-300">
                                            {{ $url->click_count }}
                                        </span>
                                    </td>
                                    <td class="px-5 py-3.5 text-gray-500 text-xs whitespace-nowrap">
                                        {{ $url->created_at->diffForHumans() }}
                                    </td>
                                    <td class="px-5 py-3.5 text-center">
                                        <button
                                            onclick="copyToClipboard('{{ $url->short_url }}', this)"
                                            class="rounded-lg bg-gray-700/30 border border-gray-700/40 px-3 py-1.5 text-xs font-medium text-gray-400 transition-all duration-200 hover:bg-gray-700/50 hover:text-gray-200 hover:scale-105 active:scale-95"
                                        >
                                            Copy
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-5 py-12 text-center text-gray-500">
                                        No links yet. Shorten your first URL above!
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        const form = document.getElementById('shortenForm');
        const urlInput = document.getElementById('urlInput');
        const shortenBtn = document.getElementById('shortenBtn');
        const btnText = document.getElementById('btnText');
        const btnLoader = document.getElementById('btnLoader');
        const resultBox = document.getElementById('resultBox');
        const shortUrlDisplay = document.getElementById('shortUrlDisplay');
        const originalUrlDisplay = document.getElementById('originalUrlDisplay');
        const errorMsg = document.getElementById('errorMsg');
        const copyText = document.getElementById('copyText');
        const linkCount = document.getElementById('linkCount');

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            errorMsg.classList.add('hidden');
            resultBox.classList.add('hidden');
            shortenBtn.disabled = true;
            btnText.classList.add('hidden');
            btnLoader.classList.remove('hidden');

            try {
                const response = await fetch('/shorten', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({ original_url: urlInput.value }),
                });

                const data = await response.json();

                if (!response.ok) {
                    const msg = data.errors?.original_url?.[0] || 'Invalid URL. Please enter a valid URL.';
                    errorMsg.textContent = msg;
                    errorMsg.classList.remove('hidden');
                    return;
                }

                shortUrlDisplay.textContent = data.short_url;
                originalUrlDisplay.textContent = data.original_url;
                resultBox.classList.remove('hidden');
                urlInput.value = '';

                addToTable(data);
            } catch {
                errorMsg.textContent = 'Something went wrong. Please try again.';
                errorMsg.classList.remove('hidden');
            } finally {
                shortenBtn.disabled = false;
                btnText.classList.remove('hidden');
                btnLoader.classList.add('hidden');
            }
        });

        function addToTable(data) {
            const tbody = document.getElementById('urlTableBody');
            const emptyRow = tbody.querySelector('td[colspan]');
            if (emptyRow) emptyRow.closest('tr').remove();

            const row = document.createElement('tr');
            row.className = 'transition-all duration-200 hover:bg-white/[0.03] hover:scale-[1.002] group animate-fade-in-up';
            row.innerHTML = `
                <td class="px-5 py-3.5">
                    <span class="text-gray-300 block max-w-[280px] truncate" title="${escapeHtml(data.original_url)}">${escapeHtml(data.original_url)}</span>
                </td>
                <td class="px-5 py-3.5">
                    <a href="${escapeHtml(data.short_url)}" target="_blank" class="text-primary-400 hover:text-primary-300 font-medium transition-colors duration-200">
                        ${escapeHtml(data.short_code)}
                    </a>
                </td>
                <td class="px-5 py-3.5 text-center">
                    <span class="inline-flex items-center justify-center min-w-[2rem] rounded-full bg-gray-700/40 px-2.5 py-0.5 text-xs font-semibold text-gray-300 animate-count">
                        ${data.click_count}
                    </span>
                </td>
                <td class="px-5 py-3.5 text-gray-500 text-xs whitespace-nowrap">just now</td>
                <td class="px-5 py-3.5 text-center">
                    <button
                        onclick="copyToClipboard('${escapeHtml(data.short_url)}', this)"
                        class="rounded-lg bg-gray-700/30 border border-gray-700/40 px-3 py-1.5 text-xs font-medium text-gray-400 transition-all duration-200 hover:bg-gray-700/50 hover:text-gray-200 hover:scale-105 active:scale-95"
                    >
                        Copy
                    </button>
                </td>
            `;
            tbody.insertBefore(row, tbody.firstChild);

            const count = parseInt(linkCount.textContent) + 1;
            linkCount.textContent = count + ' links';
        }

        function copyShortUrl() {
            const url = shortUrlDisplay.textContent;
            navigator.clipboard.writeText(url).then(() => {
                copyText.textContent = 'Copied!';
                document.getElementById('copyBtn').classList.add('animate-pulse-green');
                setTimeout(() => {
                    copyText.textContent = 'Copy';
                    document.getElementById('copyBtn').classList.remove('animate-pulse-green');
                }, 1500);
            });
        }

        function copyToClipboard(text, btn) {
            navigator.clipboard.writeText(text).then(() => {
                const original = btn.textContent;
                btn.textContent = 'Copied!';
                btn.classList.add('animate-pulse-green');
                setTimeout(() => {
                    btn.textContent = original;
                    btn.classList.remove('animate-pulse-green');
                }, 1500);
            });
        }

        function escapeHtml(str) {
            const div = document.createElement('div');
            div.textContent = str;
            return div.innerHTML;
        }
    </script>
</body>
</html>
