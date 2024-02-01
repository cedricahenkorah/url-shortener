<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
</head>

<body>
    <div class="flex justify-center items-center p-10 min-h-screen">
        <div class="flex flex-col">
            <h1 class="font-bold text-center">URL shortener</h1>

            <div class="rounded-2xl shadow-lg">
                <div class="px-10 py-5">
                    <form action="/shorten" method="post" class="flex flex-col">
                        <label for="title">Title</label>
                        <input type="text" name="title" required />

                        <label for="link">URL</label>
                        <input type="text" name="link">

                        <button type="submit" class="bg-blue-500 text-white p-2 rounded-md mt-4">Shorten</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>