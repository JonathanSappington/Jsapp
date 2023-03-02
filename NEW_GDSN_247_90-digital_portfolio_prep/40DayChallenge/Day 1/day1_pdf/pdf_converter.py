from pdf2image import convert_from_path
from PIL import Image
import sys, os, os.path
from pathlib import Path
 
def pdf2img():
    try:
        images = []

        ## Appends file paths from dragging .PDF to program
        uploaded_file = sys.argv
        uploaded_file.pop(0)

        filename = ""
        ## Checks whether the output folder path exists
        my_file = Path("output")
        print("Checking for output folder")

        ## If output folder doesn't exist then create directory
        if my_file.is_file() == False:
            print("Folder not found")
            print("Adding folder to directory")
            Path("output").mkdir(parents=True, exist_ok=True)

        for i in range(len(uploaded_file)):
            print("Gathering images from:",uploaded_file[i])
            ## Converts each page of .PDF file to Python image format
            images = convert_from_path(str(uploaded_file[i]), poppler_path='poppler-0.68.0\\bin')

            ## Gets the name of the .PDF file dropped on program
            filename = uploaded_file[i].split("\\")
            filename = filename[-1]
            filename = filename[0:len(filename) - 4]
            
            i = 0
            ## Iterates through every image converted from the .PDF and saves them as a .JPG
            for img in images:
                print("Converting "+filename+" page",str(i),"to jpg format:")
                img.save("output\\"+filename+"(page_"+str(i)+").jpg")
                print("Page "+str(i)+" Conversion Complete")
                i += 1
    except:
        print("An exception occurred")
        input("Press enter to exit: ")

pdf2img()
input("Press enter to exit: ")
