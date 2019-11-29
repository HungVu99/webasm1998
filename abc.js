const object = {
	firstName: 'Nguyen Huu',
	lastName: 'Quan',
	fullName: () => {
		return this.firstName + this.lastName
	}
}

console.log(object.firstName)