import sys
import whisper

def main():
    if len(sys.argv) < 2:
        print("Falta la ruta del archivo", file=sys.stderr)
        sys.exit(1)

    ruta_audio = sys.argv[1]

    model = whisper.load_model("base")
    result = model.transcribe(ruta_audio)

    print(result["text"])

if __name__ == "__main__":
    main()
