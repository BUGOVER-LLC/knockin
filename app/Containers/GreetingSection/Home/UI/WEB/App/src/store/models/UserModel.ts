/** @format */

export interface UserModel {
    userId: number;
    attributeId: null | number;
    roleId: number;
    profileId: number | null;
    email: string;
    active: boolean;
    parentId: null | number;
}
