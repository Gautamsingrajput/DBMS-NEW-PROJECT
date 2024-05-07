#include <stdio.h>
#include <stdlib.h>
#define DISK_SIZE 100 
struct Block {
 int data; 
 struct Block* next; 
};
struct Block* disk[DISK_SIZE]; 
void allocate_linked(int start_block, int num_blocks) {
 struct Block* current_block = NULL;
 struct Block* new_block = NULL;
 for (int i = 0; i < num_blocks; i++) {
 new_block = (struct Block*)malloc(sizeof(struct 
Block));
 if (new_block == NULL) {
 printf("Error: Memory allocation 
failed.\n");
 return;
 }
 new_block->data = 0; 
 new_block->next = NULL;
 if (current_block == NULL) {
 disk[start_block] = new_block;
 current_block = new_block;
 } else {
 current_block->next = new_block;
 current_block = new_block;
 }
 }
 printf("File allocated starting from block %d.\n", 
start_block);
}
void deallocate_linked(int start_block) {
 struct Block* current_block = disk[start_block];
 struct Block* temp;
 while (current_block != NULL) {
 temp = current_block;
 current_block = current_block->next;
 free(temp);
 }
 disk[start_block] = NULL;
 printf("File deallocated starting from block %d.\n",
start_block);
}
int main() {
 for (int i = 0; i < DISK_SIZE; i++) {
 disk[i] = NULL;
 }
 allocate_linked(10, 5);
 allocate_linked(20, 3);
 deallocate_linked(10);
 allocate_linked(25, 4);
 return 0;
}