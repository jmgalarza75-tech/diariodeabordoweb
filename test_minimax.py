from ollama import chat

try:
    response = chat(
        model='minimax-m2.5:cloud',
        messages=[{'role': 'user', 'content': 'Hello!'}],
    )
    print(response.message.content)
except Exception as e:
    print(f"Error: {e}")
