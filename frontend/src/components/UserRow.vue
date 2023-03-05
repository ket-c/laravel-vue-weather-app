<template>
   <tr >
                  <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                    <div class="flex items-center gap-x-2">
                      <img
                        class="object-cover w-8 h-8 rounded-full"
                        :src="user.user_icon"
                        alt=""
                      />
                      <div>
                        <h2 class="font-medium text-gray-800 dark:text-white">
                          {{ user.name }}
                        </h2>
                        <p
                          class="text-sm font-normal text-gray-600 dark:text-gray-400"
                        >
                          <a :href="user.email">{{ user.email }}</a>
                        </p>
                      </div>
                    </div>
                  </td>
                  <td class="px-12 py-4 text-sm font-medium whitespace-nowrap">
                    <div
                      v-if="user.email_verified_at != NUll"
                      class="inline px-3 py-1 text-sm font-normal rounded-full text-emerald-500 gap-x-2 bg-emerald-100/60 dark:bg-gray-800"
                    >
                      Verified
                    </div>
                    <div
                      v-else
                      class="inline px-3 py-1 text-sm font-normal rounded-full text-red-500 gap-x-2 bg-red-100/60 dark:bg-gray-800"
                    >
                      Not Verified
                    </div>
                  </td>
                  <td class="px-4 py-4 text-sm whitespace-nowrap">
                    <div v-if="user.weather_report != NULL">
                      <h4 class="text-gray-700 dark:text-gray-200">
                        {{ user.weather_report.location.name }}
                      </h4>
                      <p class="text-gray-500 dark:text-gray-400">
                        {{ user.weather_report.weather.condition.text }}
                      </p>
                    </div>
                    <div
                      v-else
                      class="inline px-3 py-1 text-sm font-normal rounded-full text-red-500 gap-x-2 bg-red-100/60 dark:bg-white"
                    >
                      Not Available
                    </div>
                  </td>
                  <td class="px-4 py-4 text-sm whitespace-nowrap">
                    <img
                      v-if="user.weather_report != NULL"
                      :src="
                        'http:' + user.weather_report.weather.condition.icon
                      "
                    />
                  </td>


                  <td class="px-4 py-4 text-sm whitespace-nowrap">
                    <button
                      v-if="user.weather_report != NULL"
                      type="button"
                      @click.native="
                        this.$parent.updateSelectedWeather(
                          user.weather_report.location.country,
                          user.weather_report.location.name,
                          user.weather_report.weather.condition.text,
                          user.weather_report.weather.condition.icon,
                          user.weather_report.weather.temp_c,
                          user.weather_report.last_updated,
                          user.name
                        )
                      "
                      class="px-1 py-1 text-gray-500 transition-colors duration-200 rounded-lg dark:text-gray-300 hover:bg-gray-500"
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="16"
                        height="16"
                        fill="currentColor"
                        class="bi bi-eye-fill"
                        viewBox="0 0 16 16"
                      >
                        <path
                          d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"
                        />
                        <path
                          d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"
                        />
                      </svg>
                    </button>
                  </td>
                </tr>
</template>

<script>
export default {
  components: {},
  props: {
    user: { required: true, type: Map },
  },
};
</script>
