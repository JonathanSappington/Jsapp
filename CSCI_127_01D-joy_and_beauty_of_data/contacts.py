#------------------------------------------------------------------------------------------------------
#Program Written by Jonathan Sappington
#Assignment Contacts
#Date 10/22/20
#------------------------------------------------------------------------------------------------------

#------------------------------------------------------------------------------------------------------
class Contact():
    def __init__(self, First, Last, Phone):
        self.f_name = First
        self.l_name = Last
        self.p_number = Phone

    # Returns needed contact information
    def __str__(self):
        return "Name: " + self.get_first() + " " + self.get_last() + "\n" + "Phone: " + self.get_phone() 

    # Get first name
    def get_first(self):
        return str(self.f_name)

    # Get last name
    def get_last(self):
        return str(self.l_name)

    # Get phone number
    def get_phone(self):
        return str(self.p_number)

    # Set first name
    def set_first(self, name):
        self.f_name = name

    # Set last name
    def set_last(self, name):
        self.l_name = name

    # Set phone number
    def set_phone(self, number):
        self.p_number = number
#------------------------------------------------------------------------------------------------------

#------------------------------------------------------------------------------------------------------
class Professional(Contact):

    def __init__(self, First, Last, Phone,Title):
        super().__init__(First,Last,Phone)
        self.title = Title

    # Returns needed contact information
    def __str__(self):
        return "Title: " + self.get_title() + "\n" + "Name: " + self.get_last() + ", " + self.get_first() + "\n" + "Phone: " + self.get_phone() 

    # Get title
    def get_title(self):
        return str(self.title)

    #Set title
    def set_title(self, new_title):
        self.title = new_title
#------------------------------------------------------------------------------------------------------
        
#------------------------------------------------------------------------------------------------------
class Friend(Contact):

    def __init__(self, First, Last, Phone,Birthday):
        super().__init__(First,Last,Phone)
        self.b_day = Birthday

    # Returns needed contact information
    def __str__(self):
        return "Name: " + self.get_first() + "\n" + "Phone: " + self.get_phone()  + "\n" + "Birthday: " + self.get_birthday()

    # Get birthday date
    def get_birthday(self):
        return str(self.b_day)

    # Set birthday date
    def set_birthday(self, new_birthday):
        self.b_day = new_birthday
#------------------------------------------------------------------------------------------------------

#------------------------------------------------------------------------------------------------------
def main():
    # Get contact information
    contact_1 = Friend('Donald','Duck','123-555-1234','Feb 28')
    contact_2 = Professional('Minnie','Mouse','406-555-4123','Mrs') 
    contact_3 = Contact('Mickey','Mose','406-555-2341') 
    contact_4 = Friend('Tinker','Bell','406-555-3243','???')
    contact_5 = Professional('Peter','Pan','406-555-2243','???')

    # Add contact information to a list
    contacts = [contact_1, contact_2, contact_3, contact_4, contact_5]

    # Change typos in information
    contacts[0].set_phone("406-555-1234")
    contacts[2].set_last("Mouse")
    contacts[3].set_birthday("July 2")
    contacts[4].set_title("Mr")

    # Print all contact information
    print("My Contacts")
    print("------------")
    for i in contacts:
        print(i, "\n" + "-")

    # Print specific information from contacts
    print("--------------")
    print("Specific Items:")
    print("--------------")
    # Donald's birthday date
    print(contacts[0].get_first() + "'s Birthday is " + contacts[0].get_birthday())
    # Peter Pans phone number
    print(contacts[4].get_title() + ". " + contacts[4].get_last() + "'s Phone Number is " + contacts[4].get_phone())
    
    print()
    input("Press Enter to Exit:")
#------------------------------------------------------------------------------------------------------

if __name__ == "__main__":
    main()
                
