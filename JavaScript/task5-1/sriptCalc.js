const display = document.getElementById("Show");

            function appendValue(value) {
                display.value += value;
            }

            function clearDisplay() {
                display.value = "";
            }

            function calculateResult() {
                try {
                    display.value = eval(display.value);
                } catch {
                    display.value = "Error";
                }
            }