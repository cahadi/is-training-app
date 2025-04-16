import sys
from transformers import AutoTokenizer, AutoModelForCausalLM

def main(question, answer):
    print("Загрузка токенизатора...")
    tokenizer = AutoTokenizer.from_pretrained("EleutherAI/gpt-neox-20b")
    print("Загрузка модели...")
    model = AutoModelForCausalLM.from_pretrained("EleutherAI/gpt-neox-20b")

    prompt = f"Оцени ответ на задание: '{question}'. Ответ: '{answer}'. Оценка должна быть только числом от 0 до 100, не добавляй ничего другого."

    print("Генерация текста...")
    inputs = tokenizer(prompt, return_tensors="pt")
    outputs = model.generate(**inputs, max_length=100, num_return_sequences=1)
    generated_text = tokenizer.decode(outputs[0], skip_special_tokens=True)

    print(generated_text)

if __name__ == "__main__":
    #question = sys.argv[1]
    #answer = sys.argv[2]
    question = 'Сколько будет 2+2'
    answer = '4'
    main(question, answer)
