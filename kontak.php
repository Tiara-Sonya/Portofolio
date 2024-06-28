<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Portofolio Tiara Sonya</title>
    <link href="dist/output.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="dist/image/logo.png">
</head>
<body>
<div class="w-full h-screen mt-6">
            <div class="grid sm:grid-cols-2 items-start gap-14 p-8 mx-auto max-w-4xl bg-white shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] rounded-md font-[sans-serif]">
                <div>
                    <h1 class="text-black text-3xl font-extrabold">Let's Talk</h1>
                    <p class="text-sm text-black mt-4">Have some big idea or brand to develop and need help? Then reach out we'd love to hear about your project and provide help.</p>
                    <div class="mt-12">
                        <h2 class="text-secondary text-base font-bold">Email</h2>
                        <ul class="mt-4">
                            <li class="flex items-center">
                                <div class="bg-[#e6e6e6cf] h-10 w-8 rounded-full flex items-center justify-center shrink-0">
                                    <img src="dist/image/gmail.png" alt="Facebook"></a>
                                </div>
                                <a href="mailto:2101020007@gmail.com" class="text-black text-sm ml-4">
                                    <small class="block">Mail</small>
                                    <strong>tstiarasonya@gmail.com</strong>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="mt-12">
                        <h2 class="text-secondary text-base font-bold">Socials</h2>

                        <div class="flex space-x-5 mb-6 py-5 w-48">
                        <a href="https://www.facebook.com/tiarasonyya" target="_blank">
                            <img src="dist/image/fb.png" alt="Facebook"></a>
                        <a href="https://www.instagram.com/@tiarasonyya" target="_blank">
                            <img src="dist/image/ig.png" alt="Instagram"></a>
                        <a href="https://www.tiktok.com/@tiarasonyya" target="_blank">
                            <img src="dist/image/tt.png" alt="TikTok"></a>
                        <a href="https://www.x.com/tiarasonyya" target="_blank">
                            <img src="dist/image/x.png" alt="Telegram"></a>
                        </div>
                    </div>
                </div>

                <form class="ml-auto space-y-4">
                    <input type='text' placeholder='Name'
                        class="w-full text-gray-800 rounded-md py-2.5 px-4 border text-sm outline-secondary" />
                    <input type='text' placeholder='Number'
                        class="w-full text-gray-800 rounded-md py-2.5 px-4 border text-sm outline-secondary" />
                    <input type='email' placeholder='Email'
                        class="w-full text-gray-800 rounded-md py-2.5 px-4 border text-sm outline-secondary" />
                    <input type='text' placeholder='Company (opsional)'
                        class="w-full text-gray-800 rounded-md py-2.5 px-4 border text-sm outline-secondary" />
                    <textarea placeholder='Message' rows="6"
                        class="w-full text-gray-800 rounded-md px-4 border text-sm pt-2.5 outline-secondary"></textarea>
                    <button type='button'
                        class="text-white  bg-secondary py-3 px-10 rounded-full hover:shadow-lg hover:bg-dark transition duration-300 ease-in-out text-sm px-4 py-3 w-full !mt-6">Send</button>
                </form>
            </div>
        </div>
</body>
</html>