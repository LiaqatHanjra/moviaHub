<template>

  <main class="mv-w-full mv-pt-28 mv-xl-pt-16 mv-bg-surface-container-lowest min-vh-100">
    <div class="d-flex flex-column mv-w-full">
      <!-- Sub-Header / Back Bar -->
      <div
        class="mv-w-full mv-px-margin-mobile mv-sm-px-margin mv-py-space-sm mv-bg-surface-container-lowest_80 mv-backdrop-blur-md d-flex flex-wrap align-items-center justify-content-between mv-gap-space-sm">
        <div class="d-flex mv-min-w-0 flex-wrap align-items-center mv-gap-space-sm mv-sm-gap-space-md">
          <a class="d-flex align-items-center mv-gap-space-xs mv-text-on-surface-variant mv-hover-text-primary mv-transition-colors mv-py-1p5 mv-px-space-sm mv-rounded-lg mv-hover-bg-surface-container"
            data-path="my-movies" href="/my-movies">
            <span class="material-symbols-outlined mv-text-27bd7e">arrow_back</span>
            <span class="mv-font-label-lg mv-text-label-lg mv-font-semibold">Back to Library</span>
          </a>
          <span class="mv-w-1 mv-h-4 mv-rounded-full mv-bg-surface-container-high d-none d-sm-inline-block"></span>
          <div class="d-flex align-items-center mv-gap-space-xs">
            <span class="mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-text-on-surface mv-tracking-tight">Dune</span>
            <span class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">(2021)</span>
            <span
              class="ms-1 mv-px-2 mv-py-0p5 mv-rounded-full mv-bg-primary-container_20 mv-text-primary mv-font-label-sm mv-text-label-sm mv-font-bold mv-tracking-wider">FULL
              HD • STREAMING</span>
          </div>
        </div>
        <div class="d-flex align-items-center mv-gap-space-sm">
          <button
            class="d-flex align-items-center mv-gap-1p5 mv-px-3 mv-py-1p5 mv-rounded-full mv-bg-surface-container mv-hover-bg-surface-container-high mv-text-on-surface-variant mv-hover-text-on-surface mv-font-label-md mv-text-label-md mv-transition-all"
            id="theaterModeBtn" type="button">
            <span class="material-symbols-outlined mv-text-c79a76">crop_landscape</span>
            <span class="d-none d-md-inline">Theater View</span>
          </button>
          <button
            class="mv-w-9 mv-h-9 mv-rounded-full mv-bg-surface-container mv-hover-bg-surface-container-high mv-text-on-surface-variant mv-hover-text-on-surface d-flex align-items-center justify-content-center mv-transition-colors"
            title="Movie Info" type="button">
            <span class="material-symbols-outlined mv-text-c79a76">info</span>
          </button>
        </div>
      </div>
      <!-- Main Player Workspace -->
      <div class="mv-w-full mv-px-margin-mobile mv-sm-px-margin mv-py-space-md">
        <div class="d-grid mv-grid-cols-1 mv-xl-grid-cols-12 mv-gap-gutter-mobile mv-sm-gap-gutter align-items-start">
          <!-- Video Screen & Controls Area (Cols 1-9) -->
          <div class="mv-xl-col-span-9 d-flex flex-column mv-gap-space-md">
            <!-- Cinematic Player Shell (16:9) -->
            <div
              class="mv-relative mv-group mv-w-full mv-aspect-video mv-bg-surface-container-lowest mv-rounded-xl overflow-hidden mv-shadow-2xl d-flex align-items-center justify-content-center user-select-none mv-cursor-pointer"
              id="playerFrame">
              <!-- Backdrop Video Still (Dune cinematic desert scene) -->
              <div
                class="mv-absolute mv-inset-0 mv-bg-cover mv-bg-center mv-transition-transform mv-duration-700 mv-ease-out mv-group-hover-scale-5f716f"
                data-alt="Cinematic still from Dune 2021 depicting Paul Atreides clad in a high-tech desert stillsuit walking along the sweeping sand dunes of Arrakis under an amber twin-sun sky, atmospheric atmospheric cinematic lighting, dark moody teal and burnt amber tones, 4K film still"
                style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBGqaV0n-1nwJFhErxV6i5ojKDeF37hHFn-aniyM0G1ZiYEbFnghIn5C0JfyjJOFQZp5JE-dbN-hS88c39SFHzZNxEOj6TksqJC2M26v2pCvDHxdm56X0tijYVahAR49nSwiU_PYmRB5VxVomSWTyYbiMCynM89gHa78viQgkePJEQRv_u5V0JM-pLAdw2qJ4_x1VUh1jjS2vT94IiHI_e_pzt8GAZWqbEqDBpso8nBg5PhfItou0xDmw')">
              </div>
              <!-- Cinematic Scrims (top and bottom gradient darkening) -->
              <div
                class="mv-absolute mv-inset-0 mv-bg-gradient-to-t mv-from-surface-container-lowest mv-via-surface-container-lowest_30 mv-to-surface-container-lowest_60 pe-none">
              </div>
              <!-- Center Play/Pause Pulsing Trigger Overlay -->
              <button
                class="mv-relative mv-z-10 mv-w-20 mv-h-20 mv-rounded-full mv-bg-primary-container d-flex align-items-center justify-content-center mv-shadow-xl mv-shadow-primary-container_40 mv-transition-all mv-duration-300 mv-hover-scale-110 mv-active-scale-95 mv-group-play"
                id="centerPlayBtn" type="button">
                <span class="material-symbols-outlined mv-text-175ac4 ms-1 mv-group-hover_play-scale-105 mv-transition-transform"
                  style="font-variation-settings: 'FILL' 1;">play_arrow</span>
                <span class="mv-absolute mv-ninset-2 mv-rounded-full mv-border-2 mv-border-primary_30 mv-animate-ping mv-opacity-40"></span>
              </button>
              <!-- Top-Right Live Stream Badge / Buffering Indicator -->
              <div
                class="mv-absolute mv-top-space-md mv-right-space-md mv-z-20 d-flex align-items-center mv-gap-space-xs mv-px-3 mv-py-1p5 mv-rounded-full mv-bg-surface-container-lowest_80 mv-backdrop-blur-md">
                <span class="mv-w-2 mv-h-2 mv-rounded-full mv-bg-tertiary mv-animate-pulse"></span>
                <span class="mv-font-label-sm mv-text-label-sm text-uppercase mv-tracking-widest mv-text-on-surface">1080p • Dolby
                  Atmos</span>
              </div>
              <!-- Bottom Floating Control Bar -->
              <div
                class="mv-absolute bottom-0 mv-inset-x-0 mv-z-20 mv-p-space-md mv-bg-gradient-to-t mv-from-surface-container-lowest mv-via-surface-container-lowest_95 mv-to-transparent d-flex flex-column mv-gap-space-xs mv-transition-opacity mv-duration-300">
                <!-- Scrub Bar with Buffer & Hover Preview -->
                <div class="mv-relative mv-w-full mv-group-scrub mv-py-2 mv-cursor-pointer d-flex align-items-center"
                  id="progressBarContainer">
                  <!-- Background Bar Track -->
                  <div
                    class="mv-w-full mv-h-1p5 mv-rounded-full mv-bg-surface-bright_50 mv-relative overflow-hidden mv-transition-all mv-group-hover_scrub-h-2p5">
                    <!-- Buffer Progress (75%) -->
                    <div class="mv-absolute start-0 top-0 bottom-0 mv-w-3_4 mv-bg-on-surface-variant_30 mv-rounded-full"></div>
                    <!-- Played Progress (22%) -->
                    <div
                      class="mv-absolute start-0 top-0 bottom-0 mv-w-77f77a mv-bg-gradient-to-r mv-from-secondary mv-to-primary mv-rounded-full">
                    </div>
                  </div>
                  <!-- Current Playhead Thumb -->
                  <div
                    class="mv-absolute mv-left-3557c8 mv-nml-2 mv-w-4 mv-h-4 mv-rounded-full mv-bg-primary mv-shadow-md mv-shadow-primary_50 mv-opacity-0 mv-group-hover_scrub-opacity-100 mv-transition-opacity">
                  </div>
                  <!-- Floating Timestamp Tooltip On Hover (Static Sample at current frame) -->
                  <div
                    class="mv-absolute mv-left-3557c8 mv-ntop-8 mv-ntranslate-x-1_2 mv-px-2 mv-py-0p5 mv-rounded mv-bg-surface-container-high mv-text-on-surface mv-font-label-sm mv-text-label-sm mv-shadow-md pe-none mv-opacity-0 mv-group-hover_scrub-opacity-100 mv-transition-opacity">
                    32:15
                  </div>
                </div>
                <!-- Playback Action Controls Row -->
                <div class="d-flex align-items-center justify-content-between mv-gap-space-md mv-pt-1">
                  <!-- Left Controls (Play, Skip, Volume, Timestamp) -->
                  <div class="d-flex align-items-center mv-gap-space-sm mv-sm-gap-space-md">
                    <button
                      class="mv-w-9 mv-h-9 mv-rounded-full d-flex align-items-center justify-content-center mv-text-on-surface mv-hover-text-primary mv-hover-bg-surface-container mv-transition-colors"
                      title="Play / Pause" type="button">
                      <span class="material-symbols-outlined mv-text-59700f">pause</span>
                    </button>
                    <button
                      class="mv-w-8 mv-h-8 mv-rounded-full d-flex align-items-center justify-content-center mv-text-on-surface-variant mv-hover-text-on-surface mv-hover-bg-surface-container mv-transition-colors"
                      title="Replay 10s" type="button">
                      <span class="material-symbols-outlined mv-text-27bd7e">replay_10</span>
                    </button>
                    <button
                      class="mv-w-8 mv-h-8 mv-rounded-full d-flex align-items-center justify-content-center mv-text-on-surface-variant mv-hover-text-on-surface mv-hover-bg-surface-container mv-transition-colors"
                      title="Forward 10s" type="button">
                      <span class="material-symbols-outlined mv-text-27bd7e">forward_10</span>
                    </button>
                    <!-- Volume Slider Block -->
                    <div class="d-flex align-items-center mv-gap-space-xs mv-group-vol ms-1">
                      <button
                        class="mv-w-8 mv-h-8 mv-rounded-full d-flex align-items-center justify-content-center mv-text-on-surface-variant mv-hover-text-on-surface mv-transition-colors"
                        title="Mute" type="button">
                        <span class="material-symbols-outlined mv-text-27bd7e">volume_up</span>
                      </button>
                      <div
                        class="mv-w-16 mv-sm-w-20 mv-h-1p5 mv-rounded-full mv-bg-surface-bright_50 mv-relative overflow-hidden mv-cursor-pointer">
                        <div class="h-100 mv-w-4_5 mv-bg-primary mv-rounded-full"></div>
                      </div>
                    </div>
                    <!-- Live Timestamp Display -->
                    <div class="mv-font-label-md mv-text-label-md mv-text-on-surface mv-tracking-wider mv-font-mono ms-1">
                      <span class="mv-text-primary mv-font-bold">32:15</span>
                      <span class="mv-text-outline-variant mx-1">/</span>
                      <span class="mv-text-on-surface-variant">2:35:00</span>
                    </div>
                  </div>
                  <!-- Right Controls (Audio, Speed, Quality, Fullscreen) -->
                  <div class="d-flex align-items-center mv-gap-space-xs mv-sm-gap-space-sm">
                    <!-- Audio / Subtitles Dropdown Trigger -->
                    <button
                      class="d-flex align-items-center mv-gap-1 mv-px-2p5 mv-py-1 mv-rounded-full mv-text-on-surface-variant mv-hover-text-on-surface mv-hover-bg-surface-container mv-transition-colors mv-font-label-sm mv-text-label-sm"
                      id="audioSubtitlesBtn" title="Audio &amp; Subtitles" type="button">
                      <span class="material-symbols-outlined mv-text-c79a76">subtitles</span>
                      <span class="d-none d-md-inline">ENG [CC]</span>
                    </button>
                    <!-- Speed Toggle -->
                    <button
                      class="mv-px-2 mv-py-1 mv-rounded-full mv-text-on-surface-variant mv-hover-text-on-surface mv-hover-bg-surface-container mv-transition-colors mv-font-label-sm mv-text-label-sm mv-font-bold mv-tracking-wider"
                      title="Playback Speed" type="button">
                      1.0x
                    </button>
                    <!-- Settings Gear -->
                    <button
                      class="mv-w-8 mv-h-8 mv-rounded-full d-flex align-items-center justify-content-center mv-text-on-surface-variant mv-hover-text-on-surface mv-hover-bg-surface-container mv-transition-colors"
                      title="Settings" type="button">
                      <span class="material-symbols-outlined mv-text-27bd7e">settings</span>
                    </button>
                    <!-- Fullscreen Button -->
                    <button
                      class="mv-w-9 mv-h-9 mv-rounded-full d-flex align-items-center justify-content-center mv-text-on-surface mv-hover-text-primary mv-hover-bg-surface-container mv-transition-colors ms-1"
                      id="fullscreenToggle" title="Fullscreen" type="button">
                      <span class="material-symbols-outlined mv-text-c28550">fullscreen</span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- Secondary Utility Row (Below Screen): Quick Actions & Social -->
            <div class="d-flex flex-wrap align-items-center justify-content-between mv-gap-space-md mv-py-space-sm">
              <div class="d-flex align-items-center mv-gap-space-sm">
                <button
                  class="d-flex align-items-center mv-gap-2 mv-px-space-md mv-py-2 mv-rounded-full mv-bg-primary-container mv-hover-bg-secondary-container mv-transition-all mv-font-label-md mv-text-label-md mv-shadow-md mv-shadow-primary-container_20"
                  type="button">
                  <span class="material-symbols-outlined mv-text-c79a76">download</span>
                  <span>Download Offline Copy</span>
                </button>
                <button
                  class="d-flex align-items-center mv-gap-2 mv-px-space-md mv-py-2 mv-rounded-full mv-bg-surface-container-low mv-hover-bg-surface-container mv-text-on-surface mv-transition-colors mv-font-label-md mv-text-label-md"
                  type="button">
                  <span class="material-symbols-outlined mv-text-tertiary mv-text-c79a76">bookmark_add</span>
                  <span>Add to Watchlist</span>
                </button>
                <button
                  class="mv-w-9 mv-h-9 mv-rounded-full mv-bg-surface-container-low mv-hover-bg-surface-container mv-text-on-surface-variant mv-hover-text-on-surface d-flex align-items-center justify-content-center mv-transition-colors"
                  title="Share movie" type="button">
                  <span class="material-symbols-outlined mv-text-c79a76">share</span>
                </button>
              </div>
              <div class="d-flex align-items-center mv-gap-space-xs mv-text-on-surface-variant mv-font-label-sm mv-text-label-sm">
                <span class="material-symbols-outlined mv-text-tertiary mv-text-58f475">verified</span>
                <span>Digital TVOD License • 48h Remaining Rental Window</span>
              </div>
            </div>
          </div>
          <!-- Right Column: Video Quality Selector & Audio Selection (Cols 10-12) -->
          <div class="mv-xl-col-span-3 d-flex flex-column mv-gap-space-md">
            <!-- Quality Selector Card matching Screen 9 -->
            <div class="mv-p-space-lg mv-rounded-xl mv-bg-surface-container-low d-flex flex-column mv-gap-space-md mv-shadow-sm">
              <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center mv-gap-space-xs">
                  <span class="material-symbols-outlined mv-text-primary mv-text-27bd7e">hd</span>
                  <h2 class="mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-text-on-surface">Quality</h2>
                </div>
                <span
                  class="mv-px-2 mv-py-0p5 mv-rounded-full mv-bg-tertiary_15 mv-text-tertiary mv-font-label-sm mv-text-label-sm mv-font-semibold">Auto
                  Match</span>
              </div>
              <p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">Select playback resolution. Lower bitrates
                save bandwidth on metered mobile plans.</p>
              <!-- Radio Options List -->
              <div class="d-flex flex-column mv-gap-space-sm" id="qualitySelectorGroup">
                <!-- 480p Option -->
                <label
                  class="mv-group mv-cursor-pointer mv-p-space-sm mv-rounded-lg mv-bg-surface-container mv-hover-bg-surface-container-high mv-transition-colors d-flex align-items-center justify-content-between">
                  <div class="d-flex align-items-center mv-gap-space-sm">
                    <input class="mv-accent-primary mv-w-4 mv-h-4 mv-cursor-pointer" name="video_quality" type="radio"
                      value="480p" />
                    <div class="d-flex flex-column">
                      <span class="mv-font-label-lg mv-text-label-lg mv-font-semibold mv-text-on-surface">480p</span>
                      <span class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">Standard Def • 800 MB</span>
                    </div>
                  </div>
                  <span
                    class="mv-px-1p5 mv-py-0p5 mv-rounded mv-bg-surface-bright mv-text-on-surface-variant mv-font-label-sm mv-text-label-sm">SD</span>
                </label>
                <!-- 720p Option -->
                <label
                  class="mv-group mv-cursor-pointer mv-p-space-sm mv-rounded-lg mv-bg-surface-container mv-hover-bg-surface-container-high mv-transition-colors d-flex align-items-center justify-content-between">
                  <div class="d-flex align-items-center mv-gap-space-sm">
                    <input class="mv-accent-primary mv-w-4 mv-h-4 mv-cursor-pointer" name="video_quality" type="radio"
                      value="720p" />
                    <div class="d-flex flex-column">
                      <span class="mv-font-label-lg mv-text-label-lg mv-font-semibold mv-text-on-surface">720p</span>
                      <span class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">High Def • 1.5 GB</span>
                    </div>
                  </div>
                  <span
                    class="mv-px-1p5 mv-py-0p5 mv-rounded mv-bg-surface-bright mv-text-on-surface-variant mv-font-label-sm mv-text-label-sm">HD</span>
                </label>
                <!-- 1080p Option (Active Selected) -->
                <label
                  class="mv-group mv-cursor-pointer mv-p-space-sm mv-rounded-lg mv-bg-surface-container-high mv-shadow-md d-flex align-items-center justify-content-between">
                  <div class="d-flex align-items-center mv-gap-space-sm">
                    <input checked="" class="mv-accent-primary mv-w-4 mv-h-4 mv-cursor-pointer" name="video_quality" type="radio"
                      value="1080p" />
                    <div class="d-flex flex-column">
                      <div class="d-flex align-items-center mv-gap-space-xs">
                        <span class="mv-font-label-lg mv-text-label-lg mv-font-bold mv-text-on-surface">1080p</span>
                        <span class="mv-w-1p5 mv-h-1p5 mv-rounded-full mv-bg-primary"></span>
                      </div>
                      <span class="mv-font-body-sm mv-text-body-sm mv-text-primary">Full HD 60fps • 2.5 GB</span>
                    </div>
                  </div>
                  <span
                    class="mv-px-2 mv-py-0p5 mv-rounded-full mv-bg-primary-container mv-font-label-sm mv-text-label-sm mv-font-bold">ACTIVE</span>
                </label>
                <!-- 4K Ultra HD (VIP Only) -->
                <div class="mv-p-space-sm mv-rounded-lg mv-bg-surface-container_40 d-flex align-items-center justify-content-between mv-opacity-80">
                  <div class="d-flex align-items-center mv-gap-space-sm">
                    <span class="material-symbols-outlined mv-text-outline mv-text-c79a76">lock</span>
                    <div class="d-flex flex-column">
                      <span class="mv-font-label-lg mv-text-label-lg mv-font-semibold mv-text-on-surface-variant">4K Ultra HD</span>
                      <span class="mv-font-body-sm mv-text-body-sm mv-text-outline">HDR10+ • 6.8 GB</span>
                    </div>
                  </div>
                  <span
                    class="mv-px-2 mv-py-0p5 mv-rounded mv-bg-secondary-fixed_20 mv-text-secondary mv-font-label-sm mv-text-label-sm mv-font-semibold">VIP
                    Pass</span>
                </div>
              </div>
              <!-- Network Stream Health Visualizer -->
              <div class="mv-pt-space-sm mt-1 d-flex flex-column mv-gap-1p5">
                <div class="d-flex align-items-center justify-content-between mv-font-label-sm mv-text-label-sm">
                  <span class="mv-text-on-surface-variant">Streaming Bitrate</span>
                  <span class="mv-text-tertiary mv-font-mono mv-font-semibold">8.4 Mbps (Steady)</span>
                </div>
                <div class="mv-w-full mv-h-1 mv-bg-surface-container mv-rounded-full overflow-hidden d-flex">
                  <div class="h-100 mv-bg-tertiary mv-w-4_5 mv-rounded-full"></div>
                </div>
              </div>
            </div>
            <!-- Audio & Subtitles Panel -->
            <div class="mv-p-space-lg mv-rounded-xl mv-bg-surface-container-low d-flex flex-column mv-gap-space-sm mv-shadow-sm">
              <div class="d-flex align-items-center mv-gap-space-xs mv-text-on-surface">
                <span class="material-symbols-outlined mv-text-primary mv-text-27bd7e">graphic_eq</span>
                <h3 class="mv-font-title-md mv-text-title-md mv-font-bold">Audio &amp; Subtitles</h3>
              </div>
              <div class="d-flex flex-column mv-gap-space-xs mt-1">
                <label class="mv-font-label-sm mv-text-label-sm text-uppercase mv-tracking-wider mv-text-on-surface-variant">Audio
                  Track</label>
                <select
                  class="mv-w-full mv-h-10 mv-px-space-sm mv-bg-surface-container mv-text-on-surface mv-rounded-lg mv-font-body-sm mv-text-body-sm mv-focus-outline-none mv-focus-bg-surface-container-high mv-transition-colors mv-cursor-pointer">
                  <option selected="">English [Original] (Dolby Digital 5.1)</option>
                  <option>Urdu Dubbed (Stereo 2.0)</option>
                  <option>Hindi Dubbed (Dolby 5.1)</option>
                </select>
              </div>
              <div class="d-flex flex-column mv-gap-space-xs mt-2">
                <label
                  class="mv-font-label-sm mv-text-label-sm text-uppercase mv-tracking-wider mv-text-on-surface-variant">Subtitles</label>
                <select
                  class="mv-w-full mv-h-10 mv-px-space-sm mv-bg-surface-container mv-text-on-surface mv-rounded-lg mv-font-body-sm mv-text-body-sm mv-focus-outline-none mv-focus-bg-surface-container-high mv-transition-colors mv-cursor-pointer">
                  <option selected="">English [CC]</option>
                  <option>Urdu Subtitles</option>
                  <option>Arabic Subtitles</option>
                  <option>Off</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <!-- Bottom Section: Movie Information & Chapter Metadata (Col 1-12) -->
        <div class="mv-mt-space-xl d-grid mv-grid-cols-1 mv-lg-grid-cols-12 mv-gap-gutter-mobile mv-sm-gap-gutter mv-pt-space-lg">
          <!-- Left Metadata Box (Matching Screen 9 table specs) -->
          <div
            class="mv-lg-col-span-4 d-flex flex-column mv-gap-space-md mv-p-space-lg mv-rounded-xl mv-bg-surface-container-low mv-shadow-sm">
            <div class="d-flex align-items-center mv-gap-space-xs">
              <span class="material-symbols-outlined mv-text-primary mv-text-27bd7e">movie</span>
              <h2 class="mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-text-on-surface">Movie Information</h2>
            </div>
            <div class="d-flex flex-column mv-gap-space-sm mv-font-body-md mv-text-body-md mv-divide-y-0">
              <div class="d-flex align-items-start justify-content-between mv-py-1">
                <span class="mv-text-on-surface-variant">Category</span>
                <span class="mv-font-semibold mv-text-on-surface text-end">Action / Adventure / Sci-Fi</span>
              </div>
              <div class="d-flex align-items-start justify-content-between mv-py-1">
                <span class="mv-text-on-surface-variant">Language</span>
                <span class="mv-font-semibold mv-text-on-surface">English (Dolby 5.1)</span>
              </div>
              <div class="d-flex align-items-start justify-content-between mv-py-1">
                <span class="mv-text-on-surface-variant">Release Year</span>
                <span class="mv-font-semibold mv-text-on-surface">2021</span>
              </div>
              <div class="d-flex align-items-start justify-content-between mv-py-1">
                <span class="mv-text-on-surface-variant">Size</span>
                <span class="mv-font-semibold mv-text-primary">2.5 GB</span>
              </div>
              <div class="d-flex align-items-start justify-content-between mv-py-1">
                <span class="mv-text-on-surface-variant">Director</span>
                <span class="mv-font-semibold mv-text-on-surface">Denis Villeneuve</span>
              </div>
              <div class="d-flex align-items-start justify-content-between mv-py-1">
                <span class="mv-text-on-surface-variant">Cast</span>
                <span class="mv-font-semibold mv-text-on-surface text-end">Timothée Chalamet, Zendaya, Rebecca
                  Ferguson</span>
              </div>
            </div>
            <div class="mv-pt-space-xs mt-1">
              <h4 class="mv-font-label-sm mv-text-label-sm text-uppercase mv-tracking-wider mv-text-on-surface-variant mb-1">Synopsis
              </h4>
              <p class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant mv-leading-relaxed">
                A hero's journey begins. Paul Atreides, a gifted young man born into a destiny beyond his understanding,
                must travel to the most dangerous planet in the universe to ensure the future of his family and his
                people.
              </p>
            </div>
          </div>
          <!-- Right Metadata Box: Chapter Scrubbing Rails & Scene Navigation -->
          <div
            class="mv-lg-col-span-8 d-flex flex-column mv-gap-space-md mv-p-space-lg mv-rounded-xl mv-bg-surface-container-low mv-shadow-sm">
            <div class="d-flex align-items-center justify-content-between">
              <div class="d-flex align-items-center mv-gap-space-xs">
                <span class="material-symbols-outlined mv-text-secondary mv-text-27bd7e">view_timeline</span>
                <h3 class="mv-font-headline-sm mv-text-headline-sm mv-font-bold mv-text-on-surface">Jump to Chapter</h3>
              </div>
              <span class="mv-font-label-sm mv-text-label-sm mv-text-on-surface-variant">4 Chapters Included</span>
            </div>
            <!-- Chapter Tiles Grid -->
            <div class="d-grid mv-grid-cols-1 mv-sm-grid-cols-2 mv-md-grid-cols-4 mv-gap-space-sm mv-pt-space-xs">
              <!-- Chapter 1 -->
              <div
                class="mv-group mv-cursor-pointer mv-rounded-lg overflow-hidden mv-bg-surface-container mv-hover-bg-surface-container-high mv-transition-all d-flex flex-column">
                <div class="mv-w-full mv-h-24 mv-relative overflow-hidden mv-bg-surface-bright">
                  <div class="mv-w-full h-100 mv-bg-cover mv-bg-center mv-group-hover-scale-105 mv-transition-transform mv-duration-300"
                    data-alt="Cinematic frame from Dune showing the imperial starship fleet departing Caladan against dark oceanic clouds and mist"
                    style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCSh8_k7R7dJ-z_X_UE-AzszR3et7-p-F1zKssgNXc9CRW3E02P3hWda7gEHU8ni8-HA9lDumJOweuscqYwcvAnl3hfEVqSmYyLZS8JvQCMNHkYeyZXXphbBVGzkjv5SKdRGBOBFtDf8_Z1089552pmzd9v8SG5zcAxVxhmk5vufOLEMQ6MfBpYP5l5iBpOQW7bN5slktg52HdG9OyAE2g3wFPdgRtzgC5UH8sg0vHBvIzI3j1rC9Bz3w')">
                  </div>
                  <span
                    class="mv-absolute mv-bottom-1 mv-right-1 mv-px-1p5 mv-py-0p5 mv-rounded mv-bg-surface-container-lowest_80 mv-font-mono mv-text-ee71ca mv-text-on-surface mv-font-semibold">00:00</span>
                </div>
                <div class="mv-p-space-sm d-flex flex-column">
                  <span
                    class="mv-font-label-md mv-text-label-md mv-font-bold mv-text-on-surface text-truncate mv-group-hover-text-primary mv-transition-colors">1.
                    Dreams of Caladan</span>
                  <span class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">Intro &amp; Revered Mother</span>
                </div>
              </div>
              <!-- Chapter 2 (Currently Playing) -->
              <div
                class="mv-group mv-cursor-pointer mv-rounded-lg overflow-hidden mv-bg-surface-container-high mv-transition-all d-flex flex-column mv-ring-1 mv-ring-primary_40">
                <div class="mv-w-full mv-h-24 mv-relative overflow-hidden mv-bg-surface-bright">
                  <div class="mv-w-full h-100 mv-bg-cover mv-bg-center mv-group-hover-scale-105 mv-transition-transform mv-duration-300"
                    data-alt="Cinematic frame from Dune depicting giant ornithopters landing on the scorched orange sands of Arrakeen city palace with dust clouds swirling"
                    style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAeijxbmEZ-ls0BZeB6JVdRaprqORDLl0E0_VUjkzXKEilVFDfaGeDNSoyp9Ui-wCjwIdXHlboj2JohlT26BsRyJ_Q-oIHO0Bssz8Bv0YxSi6gLODymImwYTwqdkHb0QCrRyr4PYGk80l-v0tiWGpX_CXNZ1dyzGhSTy82llRFm-sp_MvCEkPJuyO0fVhtEoT7QOTC3WtYfG8Hp6HrVr8_u25Pf7GfU9SOMEOj-NAHINuZXRkUnmWvEhQ')">
                  </div>
                  <span
                    class="mv-absolute mv-top-1 mv-left-1 mv-px-1p5 mv-py-0p5 mv-rounded-full mv-bg-primary mv-text-white mv-font-label-sm mv-text-label-sm mv-font-bold mv-tracking-tight">NOW
                    PLAYING</span>
                  <span
                    class="mv-absolute mv-bottom-1 mv-right-1 mv-px-1p5 mv-py-0p5 mv-rounded mv-bg-surface-container-lowest_80 mv-font-mono mv-text-ee71ca mv-text-on-surface mv-font-semibold">15:40</span>
                </div>
                <div class="mv-p-space-sm d-flex flex-column">
                  <span class="mv-font-label-md mv-text-label-md mv-font-bold mv-text-primary text-truncate">2. Arrival on Arrakis</span>
                  <span class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">The Duke takes command</span>
                </div>
              </div>
              <!-- Chapter 3 -->
              <div
                class="mv-group mv-cursor-pointer mv-rounded-lg overflow-hidden mv-bg-surface-container mv-hover-bg-surface-container-high mv-transition-all d-flex flex-column">
                <div class="mv-w-full mv-h-24 mv-relative overflow-hidden mv-bg-surface-bright">
                  <div class="mv-w-full h-100 mv-bg-cover mv-bg-center mv-group-hover-scale-105 mv-transition-transform mv-duration-300"
                    data-alt="Cinematic frame from Dune showing a massive spice harvester crawler in the middle of vast desert dunes with a gigantic sandworm sand vortex opening nearby"
                    style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCpi0XtPxjH2LVoUArENdCoXfkD9wuym4UGxHT0ArU1d5f5gLBkl3eOrrN7gdPDvXMnFTBuX_J65KsIIA7cfxbCeGuifRxCNgU7nmIzhg1qQLcuthdbrhuzWxXqO-mackmJSo6mQ98Bmmudi-EgT8vMuMSZI7Fpxj1FvtHNid5wb1zVZ8y278fkGQ8tCiPFu_vhksJxWg8JD4E6CgQDJ244MiaFS8PpAuucrS_hN6WWUr-4SeHb1shwLw')">
                  </div>
                  <span
                    class="mv-absolute mv-bottom-1 mv-right-1 mv-px-1p5 mv-py-0p5 mv-rounded mv-bg-surface-container-lowest_80 mv-font-mono mv-text-ee71ca mv-text-on-surface mv-font-semibold">45:10</span>
                </div>
                <div class="mv-p-space-sm d-flex flex-column">
                  <span
                    class="mv-font-label-md mv-text-label-md mv-font-bold mv-text-on-surface text-truncate mv-group-hover-text-primary mv-transition-colors">3.
                    Spice Harvester Rescue</span>
                  <span class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">First Sandworm breach</span>
                </div>
              </div>
              <!-- Chapter 4 -->
              <div
                class="mv-group mv-cursor-pointer mv-rounded-lg overflow-hidden mv-bg-surface-container mv-hover-bg-surface-container-high mv-transition-all d-flex flex-column">
                <div class="mv-w-full mv-h-24 mv-relative overflow-hidden mv-bg-surface-bright">
                  <div class="mv-w-full h-100 mv-bg-cover mv-bg-center mv-group-hover-scale-105 mv-transition-transform mv-duration-300"
                    data-alt="Cinematic frame from Dune depicting dramatic midnight explosion and artillery lasers striking Arrakeen palace in high contrast dark fire"
                    style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuA8fum_WgWsCWmPcVMd9_-BJCy3Eb5sK1yBdqZ7etoOKq8pT0oWdqkHW1h-25S_JyJer97BFGyVFDXv9Uza_KtlcOor1QObzhrrdGbx_ZNt6xo_eZyXvYxdCDZP6dNBWH4_d13ClIyRWsom2B3ygjwFvJGuuZAuoO8JDTiCW5Eb978ezJCn8B9cSp-hk4BOkSpMrhEYL3zvqdeG75VJtW0ffocjDPjr_P3yAKKxrX0BokUClPirWHGsqw')">
                  </div>
                  <span
                    class="mv-absolute mv-bottom-1 mv-right-1 mv-px-1p5 mv-py-0p5 mv-rounded mv-bg-surface-container-lowest_80 mv-font-mono mv-text-ee71ca mv-text-on-surface mv-font-semibold">1:20:00</span>
                </div>
                <div class="mv-p-space-sm d-flex flex-column">
                  <span
                    class="mv-font-label-md mv-text-label-md mv-font-bold mv-text-on-surface text-truncate mv-group-hover-text-primary mv-transition-colors">4.
                    The Harkonnen Attack</span>
                  <span class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">Night ambush in the storm</span>
                </div>
              </div>
            </div>
            <!-- User Playback Note / Offline storage advisory -->
            <div class="mt-2 mv-p-space-sm mv-rounded-lg mv-bg-surface-container d-flex align-items-center justify-content-between">
              <div class="d-flex align-items-center mv-gap-space-sm">
                <span class="material-symbols-outlined mv-text-primary mv-text-27bd7e">cloud_sync</span>
                <span class="mv-font-body-sm mv-text-body-sm mv-text-on-surface-variant">Your playback timestamp is automatically
                  synced across all connected devices.</span>
              </div>
              <a class="mv-font-label-sm mv-text-label-sm mv-font-semibold mv-text-primary mv-hover-underline text-nowrap"
                data-path="my-movies" href="/my-movies">Manage Devices</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </main>
  
</template>

<script>
import { onMounted } from 'vue';
import { bootPage } from '../runPageScript';

const externals = [
    
];

export default {
    name: 'WatchMoviePage',
    setup() {
        onMounted(() => bootPage(externals, 'Ly8gU2ltcGxlIGludGVyYWN0aXZlIGhhbmRsZXJzIGZvciBQbGF5ZXIgY29udHJvbHMKICAgICAgdmFyIGNlbnRlclBsYXlCdG4gPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnY2VudGVyUGxheUJ0bicpOwogICAgICB2YXIgcGxheWVyRnJhbWUgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgncGxheWVyRnJhbWUnKTsKICAgICAgdmFyIGlzUGxheWluZyA9IGZhbHNlOwoKICAgICAgaWYgKGNlbnRlclBsYXlCdG4gJiYgcGxheWVyRnJhbWUpIHsKICAgICAgICBjZW50ZXJQbGF5QnRuLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgKGUpID0+IHsKICAgICAgICAgIGUuc3RvcFByb3BhZ2F0aW9uKCk7CiAgICAgICAgICBpc1BsYXlpbmcgPSAhaXNQbGF5aW5nOwogICAgICAgICAgdmFyIGljb24gPSBjZW50ZXJQbGF5QnRuLnF1ZXJ5U2VsZWN0b3IoJy5tYXRlcmlhbC1zeW1ib2xzLW91dGxpbmVkJyk7CiAgICAgICAgICBpZiAoaWNvbikgewogICAgICAgICAgICBpY29uLnRleHRDb250ZW50ID0gaXNQbGF5aW5nID8gJ3BhdXNlJyA6ICdwbGF5X2Fycm93JzsKICAgICAgICAgIH0KICAgICAgICB9KTsKICAgICAgfQoKICAgICAgLy8gUXVhbGl0eSByYWRpbyBzZWxlY3RvciByZWFjdGl2aXR5CiAgICAgIHZhciBxdWFsaXR5UmFkaW9zID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbCgnaW5wdXRbbmFtZT0idmlkZW9fcXVhbGl0eSJdJyk7CiAgICAgIHF1YWxpdHlSYWRpb3MuZm9yRWFjaChyYWRpbyA9PiB7CiAgICAgICAgcmFkaW8uYWRkRXZlbnRMaXN0ZW5lcignY2hhbmdlJywgKGUpID0+IHsKICAgICAgICAgIHZhciBwYXJlbnRDYXJkcyA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoJyNxdWFsaXR5U2VsZWN0b3JHcm91cCBsYWJlbCcpOwogICAgICAgICAgcGFyZW50Q2FyZHMuZm9yRWFjaChjYXJkID0+IGNhcmQuY2xhc3NMaXN0LnJlbW92ZSgnbXYtYmctc3VyZmFjZS1jb250YWluZXItaGlnaCcsICdtdi1yaW5nLTEnLCAnbXYtcmluZy1wcmltYXJ5XzQwJykpOwogICAgICAgICAgdmFyIGFjdGl2ZUNhcmQgPSBlLnRhcmdldC5jbG9zZXN0KCdsYWJlbCcpOwogICAgICAgICAgaWYgKGFjdGl2ZUNhcmQpIHsKICAgICAgICAgICAgYWN0aXZlQ2FyZC5jbGFzc0xpc3QuYWRkKCdtdi1iZy1zdXJmYWNlLWNvbnRhaW5lci1oaWdoJyk7CiAgICAgICAgICB9CiAgICAgICAgfSk7CiAgICAgIH0pOwoKICAgICAgLy8gRnVsbHNjcmVlbiB0cmlnZ2VyIHNpbXVsYXRpb24KICAgICAgdmFyIGZzQnRuID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2Z1bGxzY3JlZW5Ub2dnbGUnKTsKICAgICAgaWYgKGZzQnRuICYmIHBsYXllckZyYW1lKSB7CiAgICAgICAgZnNCdG4uYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCAoKSA9PiB7CiAgICAgICAgICBpZiAoIWRvY3VtZW50LmZ1bGxzY3JlZW5FbGVtZW50KSB7CiAgICAgICAgICAgIHBsYXllckZyYW1lLnJlcXVlc3RGdWxsc2NyZWVuPy4oKS5jYXRjaCgoKSA9PiB7IH0pOwogICAgICAgICAgfSBlbHNlIHsKICAgICAgICAgICAgZG9jdW1lbnQuZXhpdEZ1bGxzY3JlZW4/LigpLmNhdGNoKCgpID0+IHsgfSk7CiAgICAgICAgICB9CiAgICAgICAgfSk7CiAgICAgIH0='));
    },
};
</script>
