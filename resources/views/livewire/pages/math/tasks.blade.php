<div class="mt-40 max-w-sm mx-auto relative">
  @foreach ($tasks as $index => $task)
    <div class="flex gap-x-24 items-center mb-24 text-4xl text-gray-700 ">
      <div class="min-w-[60px] text-left">{{ $task['firstNumber'] }}</div>
      <div class="min-w-[30px] text-center">{{ $task['operation'] }}</div>
      <div class="min-w-[60px] text-right">{{ $task['secondNumber'] }}</div>
      <div class="min-w-[20px] text-center">=</div>
      <input 
        name="answer"
        data-answer="{{ $task['answer'] }}"
        type="text"
        class="py-15 text-4xl max-w-125 bg-primary-100 border-none focus:border-none ring-0 focus:ring-0">
    </div>
  @endforeach
  <div class="success bg-green-400 fixed inset-0 h-full w-full flex items-center justify-center text-white text-7xl font-bold hidden">
    <h2>Super Kimi</h2>
  </div>
</div>

<script>

(function() {
  const init = () => {
    document.querySelectorAll('input[name="answer"]').forEach(input => {
      input.addEventListener('blur', (e) => {
        const answer = e.target.getAttribute('data-answer');
        if (e.target.value.length !== answer.length) {
          return;
        }
        e.target.classList.remove('!bg-green-400', '!bg-red-400');
        if (e.target.value === answer) {
          e.target.classList.add('!bg-green-400');
        } else {
          e.target.classList.add('!bg-red-400');
        }
      });
    });
  };

  const allGreen = () => {
    // get all inputs and check if they have bg-green-400 class
    const inputs = document.querySelectorAll('input[name="answer"]');
    let allGreen = true;
    inputs.forEach(input => {
      if (!input.classList.contains('!bg-green-400')) {
        allGreen = false;
      }
    });

    if (allGreen) {
      document.querySelector('.success').classList.remove('hidden');
    }
  };

  document.addEventListener('DOMContentLoaded', function() {
    init();
  });
})();

</script>

