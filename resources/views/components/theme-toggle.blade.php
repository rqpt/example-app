<header>
  <nav>
    <ul>
    </ul>
    <ul>
      <li x-effect="$refs.root.dataset.theme = lightMode ? 'light' : 'dark'">
        <button class="pico-button-override"
          data-tooltip="Theme"
          data-placement="bottom"
          aria-label="Toggle theme"
          @click="lightMode = !lightMode">
          <x-icons.moon x-show="!lightMode" />

          <x-icons.sun x-cloak
            x-show="lightMode"
            fill="#2d3138" />

        </button>
      </li>
    </ul>
  </nav>
</header>
