/** @format */

export interface UserEditModel {
    userId: number;
    email: string;
    roleId: number;
    attributeId: null | number;
    parentId: null | number;
    active: boolean;
    person: string;
}
