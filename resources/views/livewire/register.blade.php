<div>
    <!--
  This example requires Tailwind CSS v2.0+

  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ]
  }
  ```
-->
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg"
                     alt="Workflow">
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    회원가입
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    이미 회원이신가요?
                    <a href="/login" class="font-medium text-indigo-600 hover:text-indigo-500">
                        로그인
                    </a>
                </p>
            </div>
            {{ $errors }}
            <form class="mt-8 space-y-6" wire:submit.prevent="register">
                <div>
                    <label for="name">이름</label>
                    <input id="name" name="name" type="text" required
                           wire:model="name"
                           class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                           placeholder="이름을 입력해주세요">
                </div>
                <div>
                    <label for="company-name">회사명</label>
                    <input id="company-name" name="companyName" type="text" required
                           wire:model="companyName"
                           class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                           placeholder="회사명을 입력해주세요">
                </div>
                <div>
                    <label for="email">이메일</label>
                    <input id="email" name="email" type="email" required
                           wire:model="email"
                           class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                           placeholder="이메일 주소를 입력해주세요">
                </div>
                <div>
                    <label for="password">비밀번호</label>
                    <input id="password" name="password" type="password" required
                           wire:model="password"
                           class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                           placeholder="비밀번호를 입력해주세요">
                </div>

                <div>
                    <button type="submit"
                            class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        가입하기
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
