<main
  class="w-full h-screen flex flex-col items-center justify-center px-4"
>
  <div class="max-w-sm w-full text-gray-600 space-y-5">
    <div class="text-center pb-8">
      <img src="https://floatui.com/logo.svg" width="150" class="mx-auto" />
      <div class="mt-5">
        <h3 class="text-gray-800 text-2xl font-bold sm:text-3xl">
          Log in to your account
        </h3>
      </div>
    </div>
    
    <form onSubmit="event.preventDefault()" class="space-y-5">
      <div>
        <label class="font-medium"> Email </label>
        <input
          type="email"
          required
          class="w-full mt-2 px-3 py-2 text-gray-500 bg-transparent outline-none border focus:border-indigo-600 shadow-sm rounded-lg"
        />
      </div>
      <div>
        <label class="font-medium"> Password </label>
        <input
          type="password"
          required
          class="w-full mt-2 px-3 py-2 text-gray-500 bg-transparent outline-none border focus:border-indigo-600 shadow-sm rounded-lg"
        />
      </div>
      <div class="flex items-center justify-between text-sm">
        <div class="flex items-center gap-x-3">
          <input
            type="checkbox"
            id="remember-me-checkbox"
            class="checkbox-item peer hidden"
          />
          <label
            for="remember-me-checkbox"
            class="relative flex w-5 h-5 bg-white peer-checked:bg-indigo-600 rounded-md border ring-offset-2 ring-indigo-600 duration-150 peer-active:ring cursor-pointer after:absolute after:inset-x-0 after:top-[3px] after:m-auto after:w-1.5 after:h-2.5 after:border-r-2 after:border-b-2 after:border-white after:rotate-45"
          ></label>
          <span>Remember me</span>
        </div>
        <a
          href="javascript:void(0)"
          class="text-center text-indigo-600 hover:text-indigo-500"
          >Forgot password?</a
        >
      </div>
      <button
        class="w-full px-4 py-2 text-white font-medium bg-indigo-600 hover:bg-indigo-500 active:bg-indigo-600 rounded-lg duration-150"
      >
        Sign in
      </button>
    </form>
    <button
      class="w-full flex items-center justify-center gap-x-3 py-2.5 border rounded-lg text-sm font-medium hover:bg-gray-50 duration-150 active:bg-gray-100"
    >
      <!-- SVG for Google Sign In -->
      <img
        src="https://raw.githubusercontent.com/sidiDev/remote-assets/7cd06bf1d8859c578c2efbfda2c68bd6bedc66d8/google-icon.svg"
        alt="Google"
        class="w-5 h-5"
      />
      <!-- Comment: Google Icon SVG here -->
      Continue with Google
    </button>
    <p class="text-center">
      Don't have an account?
      <a
        href="javascript:void(0)"
        class="font-medium text-indigo-600 hover:text-indigo-500"
        >Sign up</a
      >
    </p>
  </div>
</main>