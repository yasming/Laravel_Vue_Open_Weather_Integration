<script>
export default {
  data: () => ({
  }),

  created() {
  },
  props: {
    user: Object
  },
  methods: {
    closeModal () {
      this.$emit('clicked-show-weather-information', '');
    }
  }
}
</script>

<template>
  <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 overflow-y-auto">
      <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div class="relative transform overflow-hidden rounded-lg bg-white px-4 pt-5 pb-4 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-sm sm:p-6">
          <div>
            <div class="mt-3 text-center sm:mt-5">
              <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Weather Information</h3>
              <div class="mt-2">
                <p class="text-sm text-gray-500"><b class="text-blue-400">Actual temperature:</b> <b>{{user.weather_information['main']['temp']+'°F' }}</b></p>
                <p class="text-sm text-gray-500"><b class="text-blue-400">Temperature feels like:</b> <b>{{user.weather_information['main']['feels_like']+'°F' }}</b></p>
                <p class="text-sm text-gray-500"><b class="text-blue-400">Min temperature:</b> <b>{{user.weather_information['main']['temp_min']+'°F' }}</b></p>
                <p class="text-sm text-gray-500"><b class="text-blue-400">Max temperature:</b> <b>{{user.weather_information['main']['temp_max']+'°F' }}</b></p>
                <p class="text-sm text-gray-500"><b class="text-blue-400">Pressure:</b> <b>{{user.weather_information['main']['pressure'] }}</b></p>
                <p class="text-sm text-gray-500"><b class="text-blue-400">Humidity:</b> <b>{{user.weather_information['main']['humidity'] }}</b></p>
                <p class="text-sm text-gray-500"><b class="text-blue-400">Type:</b> <b>{{user.weather_information['weather'][0]['description'] ?? 'no type'}}</b></p>
              </div>
            </div>
          </div>
          <div class="mt-5 sm:mt-6">
            <button @click="closeModal" class="inline-flex w-full justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:text-sm">Go back</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
