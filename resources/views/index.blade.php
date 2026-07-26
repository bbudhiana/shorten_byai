<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bana Shorten URL</title>
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
        @keyframes fade-in { from { opacity: 0; transform: translateY(8px); } to { opacity: 1; transform: translateY(0); } }
        .animate-fade-in { animation: fade-in 0.3s ease-out; }
        @keyframes pulse-green { 0%, 100% { opacity: 1; } 50% { opacity: 0.6; } }
        .animate-pulse-green { animation: pulse-green 0.4s ease-in-out; }
        @keyframes slide-down { from { opacity: 0; transform: translateY(-4px); } to { opacity: 1; transform: translateY(0); } }
        .animate-slide-down { animation: slide-down 0.2s ease-out; }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-dark-950 via-dark-900 to-dark-850 text-gray-100 antialiased">
    <div class="mx-auto max-w-4xl px-4 py-12 sm:px-6 lg:px-8">

        <div class="mb-10 text-center">
            <h1 class="text-4xl font-bold tracking-tight bg-gradient-to-r from-primary-400 to-primary-600 bg-clip-text text-transparent">
                Bana Shorten URL
            </h1>
            <p class="mt-3 text-gray-400 text-sm">Paste a long URL and get a clean short link instantly.</p>
        </div>

        <div class="mx-auto max-w-2xl mb-12">
            <form id="shortenForm" class="flex flex-col sm:flex-row gap-3">
                @csrf
                <div class="flex-1 relative">
                    <input
                        type="url"
                        name="original_url"
                        id="urlInput"
                        required
                        placeholder="https://example.com/your-very-long-url"
                        class="w-full rounded-xl border border-gray-700/50 bg-dark-800/80 backdrop-blur px-5 py-3.5 text-gray-100 placeholder-gray-500 outline-none transition-all focus:border-primary-500 focus:ring-2 focus:ring-primary-500/20"
                    >
                </div>
                <button
                    type="submit"
                    id="shortenBtn"
                    class="rounded-xl bg-gradient-to-r from-primary-600 to-primary-500 px-7 py-3.5 font-semibold text-white shadow-lg shadow-primary-600/25 transition-all hover:from-primary-500 hover:to-primary-400 hover:shadow-primary-500/30 active:scale-[0.98] disabled:opacity-50 disabled:cursor-not-allowed whitespace-nowrap"
                >
                    Shorten
                </button>
            </form>
            <p id="errorMsg" class="mt-2 text-sm text-red-400 hidden"></p>
        </div>

        <div id="resultBox" class="mx-auto max-w-2xl mb-12 hidden">
            <div class="rounded-2xl border border-primary-500/30 bg-primary-500/5 backdrop-blur p-5 animate-fade-in">
                <div class="flex items-center justify-between gap-4">
                    <div class="min-w-0 flex-1">
                        <p class="text-xs text-gray-400 mb-1">Your shortened URL</p>
                        <p id="shortUrlDisplay" class="text-lg font-semibold text-primary-400 truncate"></p>
                    </div>
                    <button
                        id="copyBtn"
                        onclick="copyShortUrl()"
                        class="shrink-0 rounded-lg bg-primary-500/10 border border-primary-500/30 px-4 py-2.5 text-sm font-medium text-primary-400 transition-all hover:bg-primary-500/20 active:scale-95"
                    >
                        <span id="copyText">Copy</span>
                    </button>
                </div>
                <p class="mt-2 text-xs text-gray-500 truncate" id="originalUrlDisplay"></p>
            </div>
        </div>

        <div class="mx-auto max-w-4xl">
            <div class="flex items-center justify-between mb-5">
                <h2 class="text-lg font-semibold text-gray-200">Recent Links</h2>
                <span id="linkCount" class="text-xs text-gray-500 bg-dark-800/60 px-3 py-1 rounded-full border border-gray-700/40">{{ $urls->count() }} links</span>
            </div>

            <div class="overflow-hidden rounded-2xl border border-gray-700/40 bg-dark-800/40 backdrop-blur">
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
                                <tr class="transition-colors hover:bg-white/[0.02] group">
                                    <td class="px-5 py-3.5">
                                        <span class="text-gray-300 block max-w-[280px] truncate" title="{{ $url->original_url }}">{{ $url->original_url }}</span>
                                    </td>
                                    <td class="px-5 py-3.5">
                                        <a href="{{ $url->short_url }}" target="_blank" class="text-primary-400 hover:text-primary-300 font-medium transition-colors">
                                            {{ $url->short_code }}
                                        </a>
                                    </td>
                                    <td class="px-5 py-3.5 text-center">
                                        <span class="inline-flex items-center justify-center min-w-[2rem] rounded-full bg-gray-700/40 px-2.5 py-0.5 text-xs font-semibold text-gray-300">
                                            {{ $url->click_count }}
                                        </span>
                                    </td>
                                    <td class="px-5 py-3.5 text-gray-500 text-xs whitespace-nowrap">
                                        {{ $url->created_at->diffForHumans() }}
                                    </td>
                                    <td class="px-5 py-3.5 text-center">
                                        <button
                                            onclick="copyToClipboard('{{ $url->short_url }}', this)"
                                            class="rounded-lg bg-gray-700/30 border border-gray-700/40 px-3 py-1.5 text-xs font-medium text-gray-400 transition-all hover:bg-gray-700/50 hover:text-gray-200 active:scale-95"
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
            shortenBtn.textContent = 'Shortening...';

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
                shortenBtn.textContent = 'Shorten';
            }
        });

        function addToTable(data) {
            const tbody = document.getElementById('urlTableBody');
            const emptyRow = tbody.querySelector('td[colspan]');
            if (emptyRow) emptyRow.closest('tr').remove();

            const row = document.createElement('tr');
            row.className = 'transition-colors hover:bg-white/[0.02] animate-fade-in';
            row.innerHTML = `
                <td class="px-5 py-3.5">
                    <span class="text-gray-300 block max-w-[280px] truncate" title="${escapeHtml(data.original_url)}">${escapeHtml(data.original_url)}</span>
                </td>
                <td class="px-5 py-3.5">
                    <a href="${escapeHtml(data.short_url)}" target="_blank" class="text-primary-400 hover:text-primary-300 font-medium transition-colors">
                        ${escapeHtml(data.short_code)}
                    </a>
                </td>
                <td class="px-5 py-3.5 text-center">
                    <span class="inline-flex items-center justify-center min-w-[2rem] rounded-full bg-gray-700/40 px-2.5 py-0.5 text-xs font-semibold text-gray-300">
                        ${data.click_count}
                    </span>
                </td>
                <td class="px-5 py-3.5 text-gray-500 text-xs whitespace-nowrap">just now</td>
                <td class="px-5 py-3.5 text-center">
                    <button
                        onclick="copyToClipboard('${escapeHtml(data.short_url)}', this)"
                        class="rounded-lg bg-gray-700/30 border border-gray-700/40 px-3 py-1.5 text-xs font-medium text-gray-400 transition-all hover:bg-gray-700/50 hover:text-gray-200 active:scale-95"
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
