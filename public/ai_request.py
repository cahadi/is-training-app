import sys
from transformers import pipeline

def main(question, answer):
    generator = pipeline('text-generation', model='gpt2')

    prompt = f"Оцени ответ на задание: '{question}'. Ответ: '{answer}'. Оценка должна быть только числом от 0 до 100, не добавляй ничего другого."

    print("Генерация текста...")
    outputs = generator(
        prompt,
        min_length=10,
        max_new_tokens=50,
        num_return_sequences=1,
        do_sample=True,
        truncation=True,
        pad_token_id=generator.tokenizer.eos_token_id
    )

    generated_text = outputs[0]['generated_text']
    print(generated_text)

if __name__ == "__main__":
    question = sys.argv[1]
    answer = sys.argv[2]
    main(question, answer)
